<?php

namespace Test\MestreCodigo\PimpMyLog;

include_once('./pimp-my-log/PimpMyLog.php');

use MestreCodigo\PimpMyLog\PimpMyLog;
use PHPUnit\Framework\TestCase;

/**
 * @covers PimpMyLog
 */
class PimpMyLogTest extends TestCase {

    private $pimpMyLog;

    protected function setUp(): void {
        $this->pimpMyLog = new PimpMyLog();
    }

    public function testReplaceConfidentialData(): void {
        $inputData = '123.123.1.21 - [10/Jan/2020:00:23:48 -0300] "POST /payment HTTP/1.0" Payment confirmed with credit card 5124 1251 1223 2523, cvv: 827, exp date: 09/22';
        $expectedValue = '***.***.***.*** - [10/Jan/2020:00:23:48 -0300] "POST /payment HTTP/1.0" Payment confirmed with credit card 5124 **** **** 2523, cvv: ***, exp date: **/****';

        $resultData = $this->pimpMyLog->replaceConfidentialData($inputData);

        self::assertEquals($expectedValue, $resultData);
    }
}