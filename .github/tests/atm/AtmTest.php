<?php

namespace Test\MestreCodigo\Atm;

include_once('./atm/Atm.php');

use MestreCodigo\Atm\Atm;
use PHPUnit\Framework\TestCase;

/**
 * @covers Atm
 */
class AtmTest extends TestCase {

    private $atm;

    protected function setUp(): void {
        $this->atm = new atm();
    }

    /**
     * @testWith [289, "[100 => 2, 50 => 1, 20 => 1, 10 => 1, 5 => 1, 1 => 4]"]
     *           [0, "Este valor não é válido"]
     *           [100, "[100 => 1]"]
     *           [49, "[20 => 2, 5 => 1, 1 => 4]"]
     *           [1, "[1 => 1]"]
     */
    public function testCalculateMoneyBills(int $withdrawalAmount, string $expectedValue): void {
        $calculatedMoneyBills = $this->atm->getCalculateMoneyBills($withdrawalAmount);

        self::assertEquals($expectedValue, $calculatedMoneyBills, "Test Fail in Atm with $withdrawalAmount.");
    }
}