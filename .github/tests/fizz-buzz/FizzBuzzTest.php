<?php

namespace Test\MestreCodigo\FizzBuzz;

include_once("./fizz-buzz/FizzBuzz.php");

use MestreCodigo\FizzBuzz\FizzBuzz;
use PHPUnit\Framework\TestCase;

/**
 * @covers FizzBuzz
 */
class FizzBuzzTest extends TestCase {
    private $fizzBuzz;

    protected function setUp(): void {
        $this->fizzBuzz = new FizzBuzz();
    }

    /**
     * @testWith [1, "1"]
     *           [2, "2"]
     *           [3, "Fizz"]
     *           [9, "Fizz"]
     *           [5, "Buzz"]
     *           [15, "FizzBuzz"]
     *           [50, "Buzz"]
     */
    public function testIsFizzBuzz(int $value, string $expectedText): void {
        $isFizzBuzz = $this->fizzBuzz->identifyText($value);

        self::assertEquals($expectedText, $isFizzBuzz, "Test Fail in $value.");
    }
}