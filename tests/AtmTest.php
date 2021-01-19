<?php

namespace Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class AtmTest extends TestCase
{

    public function getValidWithdraws(): array
    {
        return [
            [3, '[1 => 3]'],
            [5, '[5 => 1]'],
            [10, '[10 => 1]'],
            [40, '[20 => 2]'],
            [50, '[50 => 1]'],
            [400, '[100 => 4]'],
            [289, '[100 => 2, 50 => 1, 20 => 1, 10 => 1, 5 => 1, 1 => 4]'],
        ];
    }

    /**
     * @test
     * @dataProvider getValidWithdraws
     */
    public function givenAValidWithdrawValue_whenCalculatingNumberOfBills_thenReturnTheExpectedBills(
        int $validWithdrawAmount,
        string $expectedBillsToWithdraw
    ): void
    {
        $withdrawResult = $this->getWithdrawBillsOfAmount($validWithdrawAmount);

        Assert::assertEquals($expectedBillsToWithdraw, $withdrawResult);
    }

    /** @test */
    public function givenAnInvalidWithdrawValue_whenCalcutingNumberOfBills_thenReturnAnInformativeMessage(): void
    {
        $withdrawResult = $this->getWithdrawBillsOfAmount(0);

        Assert::assertEquals('Este valor não é válido', $withdrawResult);
    }

    private function getWithdrawBillsOfAmount(int $withdrawAmount): string
    {
        return exec("php -f /var/www/html/atm/index.php  $withdrawAmount");
    }
}
