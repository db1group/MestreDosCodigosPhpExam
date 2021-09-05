<?php

namespace Test\MestreCodigo\Fibonacci;

include_once('./fibonacci/Fibonacci.php');

use MestreCodigo\Fibonacci\Fibonacci;
use PHPUnit\Framework\TestCase;

/**
 * @covers Fibonacci
 */
class FibonacciTest extends TestCase {

    private $fibonacci;

    protected function setUp(): void {
        $this->fibonacci = new Fibonacci();
    }

    /**
     * @testWith [0, 0]
     *           [1, 1]
     *           [2, 1]
     *           [3, 2]
     *           [4, 3]
     *           [5, 5]
     *           [8, 21]
     *           [37, 24157817]
     */
    public function testNthNumberOfDeterminedPosition(int $position, int $expectedValue): void {
        $calculatedNth = $this->fibonacci->getNthValue($position);

        self::assertEquals($expectedValue, $calculatedNth, "Test Fail in Fibonacci Nth number of position $position.");
    }
}