<?php

namespace Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    function getExpressionsWithResults(): array {
        return [
            //                       math expression      expected resolution
            '1 + 1' =>               ['1 + 1'             , '2.00' ],
            '3 - 4' =>               ['3 - 4'             , '-1.00'],
            '2 / 2' =>               ['2 / 2'             , '1.00' ],
            '3 * 3' =>               ['3 * 3'             , '9.00' ],
            '2 + 2 * 3' =>           ['2 + 2 * 3'         , '8.00' ],
            '3 * 2.7 + 2' =>         ['3 * 2.7 + 2'       , '10.10'],
            '5 - 15 / 3' =>          ['5 - 15 / 3'        , '0.00' ],
            '3 + 1 / 1 * 5 + 1' =>   ['3 + 1 / 1 * 5 + 1' , '9.00' ],
            '3 / 0' =>               ['3 / 0'             , 'Erro de divisão por'],
            '1 - 3' =>               ['1 - 3'             , '-2.00' ],
            '3 * -15' =>             ['3 * -15'           , '-45.00'],
            '535.98 * 10000.00' =>   ['535.98 * 10000.00' , '5359800.00'],
            '258 / 2.58' =>          ['258 / 2.58'        , '100.00'],
        ];
    }

    /**
     * @test
     * @dataProvider getExpressionsWithResults
     */
    public function givenMathExpressions_shouldResolveThem(
        string $mathExpression,
        string $expectedResolution
    ): void
    {
        $mathProblemResolution = $this->runExerciseWithParameter($mathExpression);

        $errorMessage = "Failed asserting that $mathProblemResolution is the resolution for $mathExpression.";
        Assert::assertEquals($expectedResolution, $mathProblemResolution, $errorMessage);
    }

    private function runExerciseWithParameter(string $parameter): string
    {
        return exec("php -f /var/www/html/calculator/index.php  \"$parameter\"");
    }
}
