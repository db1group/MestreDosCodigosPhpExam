<?php

namespace Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class PalindromeTest extends TestCase
{

    public function getPalindromesPhrasesWithExpectedResult(): array
    {
        return [
            ['a nut for a jar of tuna', 'a nut for a jar of tuna'],
            ['borrow or rob', 'borrow or rob'],
            ['yo banana boy', 'yo banana boy'],
        ];
    }

    /**
     * @test
     * @dataProvider getPalindromesPhrasesWithExpectedResult
     */
    public function givenPalindromePhrases_ShouldPrintPhrases(
        string $phrases,
        string $expected
    ): void
    {
        $returnValue = $this->runExerciseWithParameter($phrases);
        Assert::assertEquals($expected, $returnValue);
    }

    public function getPhrasesNotPalindromesWithExpectedResult(): array
    {
        return [
            ['hello world', ''],
            ['the best friend', ''],
            ['code master', ''],
        ];
    }

    /**
     * @test
     * @dataProvider getPhrasesNotPalindromesWithExpectedResult
     */
    public function givenPhrasesNotPalindromes_ShouldPrintNothing(
        string $phrases,
        string $expected
    ): void
    {
        $returnValue = $this->runExerciseWithParameter($phrases);
        Assert::assertEquals($expected, $returnValue);
    }

    private function runExerciseWithParameter(string $parameter): string
    {
        return exec('php -f /var/www/html/palindrome/index.php "' . $parameter . '"');
    }
}
