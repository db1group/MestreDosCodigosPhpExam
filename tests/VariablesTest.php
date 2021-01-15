<?php

namespace Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class VariablesTest extends TestCase
{

    const ERROR_MESSAGE_WITHOUT_CORRECT_ANSWERS_CLUE = 'You didn\'t answer correctly the variables exercise';

    /** @test */
    public function givenThePrintedResponse_shouldBeTheCorrectAnswerToCurrentExercise(): void
    {
        $answer = explode(' ', $this->getAnswer());
        $expectedAnswer = ['B', 'G', 'E'];

        $hadACorrectAnswer = array_diff($answer, $expectedAnswer) === array_diff($expectedAnswer, $answer);

        Assert::assertTrue($hadACorrectAnswer, self::ERROR_MESSAGE_WITHOUT_CORRECT_ANSWERS_CLUE);
    }

    public function getAlternativesThatShouldNotBeAnswered(): array
    {
        return [
            'A' => ['A'],
            'C' => ['C'],
            'D' => ['D'],
            'F' => ['F'],
            'H' => ['H'],
            'I' => ['I'],
        ];
    }

    /**
     * @test
     * @dataProvider getAlternativesThatShouldNotBeAnswered
     */
    public function givenThePrintedResponse_shouldNotAnswerAWrongAlternative(
        string $wrongAlternative
    ): void
    {
        $answer = explode(' ', $this->getAnswer());

        $hadAWrongAnswer = in_array($wrongAlternative, $answer);

        Assert::assertFalse($hadAWrongAnswer, self::ERROR_MESSAGE_WITHOUT_CORRECT_ANSWERS_CLUE);
    }

    private function getAnswer(): string
    {
        return exec('php -f /var/www/html/variables/index.php');
    }
}
