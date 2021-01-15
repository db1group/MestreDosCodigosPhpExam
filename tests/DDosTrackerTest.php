<?php

namespace Test;

use DateTimeZone;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class DDosTrackerTest extends TestCase
{
    private const ONE_SECOND = 1000;

    public function getTimezoneOffsetsAllAroundTheWorld(): array
    {
        return [
            '-11' => [-11],
            '-10' => [-10],
            '-9' => [-9],
            '-8' => [-8],
            '-7' => [-7],
            '-6' => [-6],
            '-5' => [-5],
            '-4' => [-4],
            '-3' => [-3],
            '-2' => [-2],
            '-1' => [-1],
            '0' => [0],
            '1' => [1],
            '2' => [2],
            '3' => [3],
            '4' => [4],
            '5' => [5],
            '6' => [6],
            '7' => [7],
            '8' => [8],
            '9' => [9],
            '10' => [10],
            '11' => [11],
            '12' => [12],
        ];
    }

    /**
     * @test
     * @dataProvider getTimezoneOffsetsAllAroundTheWorld
     */
    public function given(int $timezoneOffset): void
    {
        $currentTimeInUtc = new \DateTimeImmutable('now');

        $currentTimeWithOffset = $currentTimeInUtc
            ->modify($timezoneOffset . ' hours')
            ->format('Y-m-d H:i:s');

        $candidateTimezone = $this->runExerciseWithParameter($currentTimeWithOffset);

        $timeInCandidateTimezone = new \DateTimeImmutable($currentTimeWithOffset, new DateTimeZone($candidateTimezone));

        $errorMessage = "$candidateTimezone is not the correct timezone to $currentTimeWithOffset";
        $positiveDifferenceBetweenUtcAndTimezone = $this->getDifferenceBetweenNowAndCandidateTimezone(
            $currentTimeInUtc,
            $timeInCandidateTimezone
        );

        Assert::assertLessThan(self::ONE_SECOND, $positiveDifferenceBetweenUtcAndTimezone, $errorMessage);
    }

    private function runExerciseWithParameter(string $parameter): string
    {
        return exec("php -f /var/www/html/ddos-tracker/index.php '$parameter'");
    }

    private function getDifferenceBetweenNowAndCandidateTimezone(\DateTimeInterface $currentTimeInUtc, \DateTimeInterface $timeInCandidateTimezone)
    {
        $timestampFromNowInUtc = $currentTimeInUtc->getTimestamp();
        $timestampFromCandidateTimezone = $timeInCandidateTimezone->getTimestamp();

        return abs($timestampFromNowInUtc - $timestampFromCandidateTimezone);
    }
}
