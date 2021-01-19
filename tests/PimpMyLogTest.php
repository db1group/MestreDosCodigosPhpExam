<?php

namespace Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class PimpMyLogTest extends TestCase
{

    public function getLogsWithIpAddresses(): array
    {
        return [
            ['123.123.123.123', '***.***.***.***'],
            ['223.21.1.12', '***.***.***.***'],
            ['223.21.1.12 1.2.3.4', '***.***.***.*** ***.***.***.***'],
            ['IP ADDRESS: 1.2.3.4', 'IP ADDRESS: ***.***.***.***'],
        ];
    }

    /**
     * @test
     * @dataProvider getLogsWithIpAddresses
     */
    public function givenARawLogLine_WhenFilteringPersonalInfo_thenReplaceOnlyExistingIpAddressesByStars(
        string $rawLog,
        string $expectedFilteredLog
    ): void
    {
        $filteredLog = $this->filterRawLogs($rawLog);

        Assert::assertEquals($expectedFilteredLog, $filteredLog);
    }

    public function getLogsWithCreditCardNumbers(): array
    {
        return [
            ['5124 1251 1223 2523', '5124 **** **** 2523'],
            ['1521 5123 9182 9000', '1521 **** **** 9000'],
        ];
    }

    /**
     * @test
     * @dataProvider getLogsWithCreditCardNumbers
     */
    public function givenARawLogLine_WhenFilteringPersonalInfo_thenShouldReplaceOnlyCreditCardNumbersByStars(
        string $rawLog,
        string $expectedFilteredLog
    ): void
    {
        $filteredLog = $this->filterRawLogs($rawLog);

        Assert::assertEquals($expectedFilteredLog, $filteredLog);
    }

    public function getLogsWithCvvNumbers(): array
    {
        return [
            ['cvv: 124', 'cvv: ***'],
            ['CVV: 12', 'CVV: ***'],
            ['cvv 5123', 'cvv ***'],
        ];
    }

    /**
     * @test
     * @dataProvider getLogsWithCvvNumbers
     */
    public function givenARawLogLine_WhenFilteringPersonalInfo_thenShouldReplaceOnlyCvvNumbersByStars(
        string $rawLog,
        string $expectedFilteredLog
    ): void
    {
        $filteredLog = $this->filterRawLogs($rawLog);

        Assert::assertEquals($expectedFilteredLog, $filteredLog);
    }

    public function getLogsWithExpirationDates(): array
    {
        return [
            ['exp date: 12/20', 'exp date: **/****'],
            ['exp date: 12/2024', 'exp date: **/****'],
            ['exp date 12/20', 'exp date **/****'],
            ['exp date 1/20', 'exp date **/****'],
            ['exp date: 01/20', 'exp date: **/****'],
        ];
    }

    /**
     * @test
     * @dataProvider getLogsWithExpirationDates
     */
    public function givenARawLogLine_WhenFilteringPersonalInfo_thenShouldReplaceOnlyExpirationDatesByStars(
        string $rawLog,
        string $expectedFilteredLog
    ): void
    {
        $filteredLog = $this->filterRawLogs($rawLog);

        Assert::assertEquals($expectedFilteredLog, $filteredLog);
    }

    public function getLogsExamples(): array
    {
        return [
            'REGULAR LOG' => [
                '123.123.1.21 - [10/Jan/2020:00:23:48 -0300] "POST /payment HTTP/1.0" Payment confirmed with credit card 5124 1251 1223 2523, cvv: 827, exp date: 09/22"',
                '***.***.***.*** - [10/Jan/2020:00:23:48 -0300] "POST /payment HTTP/1.0" Payment confirmed with credit card 5124 **** **** 2523, cvv: ***, exp date: **/****"'
            ],
            'CVV AND EXP DATE WITHOUT COLONS' => [
                '123.123.1.21 - [10/Jan/2020:00:23:48 -0300] "POST /payment HTTP/1.0" Payment confirmed with credit card 5124 1251 1223 2523, cvv 827, exp date 09/22"',
                '***.***.***.*** - [10/Jan/2020:00:23:48 -0300] "POST /payment HTTP/1.0" Payment confirmed with credit card 5124 **** **** 2523, cvv ***, exp date **/****"'
            ],
            'DIFFERENT SIZE IN CVV' => [
                '123.123.1.21 - [10/Jan/2020:00:23:48 -0300] "POST /payment HTTP/1.0" Payment confirmed with credit card 5124 1251 1223 2523, cvv: 22, exp date: 09/22"',
                '***.***.***.*** - [10/Jan/2020:00:23:48 -0300] "POST /payment HTTP/1.0" Payment confirmed with credit card 5124 **** **** 2523, cvv: ***, exp date: **/****"'
            ],
            'DIFFERENT YEAR FORMATTING IN EXP DATE ' => [
                '123.123.1.21 - [10/Jan/2020:00:23:48 -0300] "POST /payment HTTP/1.0" Payment confirmed with credit card 5124 1251 1223 2523, cvv: 22, exp date: 09/2022"',
                '***.***.***.*** - [10/Jan/2020:00:23:48 -0300] "POST /payment HTTP/1.0" Payment confirmed with credit card 5124 **** **** 2523, cvv: ***, exp date: **/****"'
            ],
        ];
    }

    /**
     * @test
     * @dataProvider getLogsExamples
     */
    public function givenARawLogLine_WhenFilteringPersonalInfo_thenShouldReplaceAllPersonalInfoByStars(
        string $rawLog,
        string $expectedFilteredLog
    ): void
    {
        $filteredLog = $this->filterRawLogs($rawLog);

        Assert::assertEquals($expectedFilteredLog, $filteredLog);
    }

    private function filterRawLogs(string $rawLog): string
    {
        return exec("php -f /var/www/html/pimp-my-log/index.php  '$rawLog'");
    }
}