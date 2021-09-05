<?php

namespace Test\MestreCodigo\DDOSTracker;

include_once("./ddos-tracker/DDOSTracker.php");

use MestreCodigo\DDOSTracker\DDOSTracker;
use PHPUnit\Framework\TestCase;

/**
 * @covers DDOSTracker
 */
class DDOSTrackerTest extends TestCase {

    private $ddosTracker;

    protected function setUp(): void {
        $this->ddosTracker = new DDOSTracker();
    }

    /**
     * @testWith ["America/Anguilla", "America/Anguilla"]
     *           ["America/Manaus", "America/Anguilla"]
     *           ["Pacific/Yap", "Antarctica/DumontDUrville"]
     *           ["America/Argentina/Mendoza", "America/Araguaina"]
     */
    public function testFindPossibleTimezone(string $inputTimezone, string $expectedTimezone): void {
        $inputDatetime = new \DateTime('now', new \DateTimeZone($inputTimezone));

        $datetimeInString = $inputDatetime->format('d-m-Y H:i:s');
        $possibleTimezone = $this->ddosTracker->findPossibleTimezoneName($datetimeInString);

        $this->assertEquals($expectedTimezone, $possibleTimezone);
    }
}