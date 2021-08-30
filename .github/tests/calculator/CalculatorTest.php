<?php

namespace Test\MestreCodigo;

include_once('./calculator/Calculator.php');

use MestreCodigo\Calculator\Calculator;
use PHPUnit\Framework\TestCase;

/**
 * @covers Calculator
 */
class CalculatorTest extends TestCase {
    private $calculator;

    protected function setUp(): void {
        $this->calculator = new Calculator();
    }

    /**
     * @testWith ["1 + 1", "2.00"]
     *           ["3 – 4", "-1.00"]
     *           ["3 - 4", "-1.00"]
     *           ["2 / 2", "1.00"]
     *           ["3 * 3", "9.00"]
     *           ["2 + 2 * 3", "8.00"]
     *           ["3 * 2.7 + 2", "10.10"]
     *           ["5 – 15 / 3", "0.00"]
     *           ["3 / 0", "Erro de divisão por"]
     *           ["3 + 1 / 1 * 5 + 1", "9.00"]
     */
    public function testIsFizzBuzz(string $term, string $expectedValue): void {
        $calculatedValue = $this->calculator->calculate($term);

        self::assertEquals($expectedValue, $calculatedValue, "Test Fail in $term.");
    }
}