<?php

namespace Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{

    public function getNumbersMultipleOf3(): array
    {
        return [
            ['3'],
            ['6'],
            ['9'],
            ['27'],
            ['33'],
            ['999'],
        ];
    }

    /**
     * @test
     * @dataProvider getNumbersMultipleOf3
     */
    public function givenANumberMultipleOf3_ShouldPrintFizz(string $numberMultipleOf3): void
    {
        $returnValue = $this->runExerciseWithParameter($numberMultipleOf3);
        Assert::assertEquals('Fizz', $returnValue);
    }

    public function getNumbersMultipleOf5(): array
    {
        return [
            ['5'],
            ['10'],
            ['20'],
            ['55'],
            ['100'],
            ['1000'],
        ];
    }

    /**
     * @test
     * @dataProvider getNumbersMultipleOf5
     */
    public function givenANumberMultipleOf5_ShouldPrintBuzz(string $numberMultipleOf5): void
    {
        $returnValue = $this->runExerciseWithParameter($numberMultipleOf5);
        Assert::assertEquals('Buzz', $returnValue);
    }

    public function getNumbersMultipleOf3And5(): array
    {
        return [
            ['15'],
            ['30'],
            ['45'],
            ['90'],
            ['900'],
            ['960'],
        ];
    }

    /**
     * @test
     * @dataProvider getNumbersMultipleOf3And5
     */
    public function givenANumberMultipleOf3And5_ShouldPrintFizzBuzz(string $numberMultipleOf3And5): void
    {
        $returnValue = $this->runExerciseWithParameter($numberMultipleOf3And5);
        Assert::assertEquals('FizzBuzz', $returnValue);
    }

    public function getNumbersNotMultipleOf3Nor5(): array
    {
        return [
            ['1'],
            ['2'],
            ['4'],
            ['8'],
            ['322'],
            ['1001'],
        ];
    }

    /**
     * @test
     * @dataProvider getNumbersNotMultipleOf3Nor5
     */
    public function givenANumberNotMultipleOf3Nor5_ShouldPrintTheNumberItself(string $numberNotMultipleOf3Nor5): void
    {
        $returnValue = $this->runExerciseWithParameter($numberNotMultipleOf3Nor5);
        Assert::assertEquals($numberNotMultipleOf3Nor5, $returnValue);
    }

    private function runExerciseWithParameter(string $parameter): string
    {
        return exec('php -f /var/www/html/fizz-buzz/index.php ' . $parameter);
    }
}
