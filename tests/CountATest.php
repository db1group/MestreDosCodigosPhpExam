<?php

namespace Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class CountATest extends TestCase
{

    public function getWordsWithSameSizeParameter(): array
    {
        return [
            'banana' => ['banana', 3],
            'BANANA' => ['BANANA', 3],
            'aaaaaaaaaa' => ['aaaaaaaaaa', 10],
            'aa' => ['aa', 2],
            'melon' => ['melon', 0],
        ];
    }

    /**
     * @test
     * @dataProvider getWordsWithSameSizeParameter
     */
    public function givenAWord_whenWordHasSameLengthAsSizeParameter_thenShouldReturnAMessageCountingAllACharacters(
        string $wordToBeProcessed,
        int $expectedLength
    ): void
    {
        $sizeParameter = strlen($wordToBeProcessed);

        $countingMessage = $this->countAllACharactersIn($wordToBeProcessed, $sizeParameter);

        $expectedCountingMessage = "Existem {$expectedLength} letras 'a' na palavra $wordToBeProcessed.";
        Assert::assertEquals($expectedCountingMessage, $countingMessage);
    }

    public function getWordsOnlyOneACharacter(): array
    {
        return [
            'a' => ['a'],
            'A' => ['A'],
            'apple' => ['apple'],
        ];
    }

    /**
     * @test
     * @dataProvider getWordsOnlyOneACharacter
     */
    public function givenAWordWithOnlyOneACharacter_whenCountingACharacter_thenReturnASingularMessage(string $wordWithOneA): void
    {
        $sizeParameter = strlen($wordWithOneA);

        $countingMessage = $this->countAllACharactersIn($wordWithOneA, $sizeParameter);

        $expectedCountingMessage = "Existe 1 letra 'a' na palavra $wordWithOneA.";
        Assert::assertEquals($expectedCountingMessage, $countingMessage);
    }

    public function getWordsWithGreaterSizeParameter(): array
    {
        return [
            '10 sized banana' => ['banana', 10, 'bananabana', 5],
            '10 sized BANANA' => ['BANANA', 10, 'BANANABANA', 5],
            '10 sized melon' => ['melon', 10, 'melonmelon', 0],
            '20 sized abc' => ['abc', 20, 'abcabcabcabcabcabcab', 7],
        ];
    }

    /**
     * @test
     * @dataProvider getWordsWithGreaterSizeParameter
     */
    public function givenASmallerWordThanSizeParameter_whenCountingACharacters_thenReplicateTheWorldUntilLengthBeTheSameAsSizeParameter(
        string $wordToBeProcessed,
        int $sizeParameter,
        string $expectedWordAfterReplication,
        int $expectedACharacterCount
    ): void
    {
        $countingMessage = $this->countAllACharactersIn($wordToBeProcessed, $sizeParameter);

        $expectedCountingMessage = "Existem $expectedACharacterCount letras 'a' na palavra $expectedWordAfterReplication.";
        Assert::assertEquals($expectedCountingMessage, $countingMessage);
    }

    public function getWordsWithSmallerSizeParameter(): array
    {
        return [
            '3 sized banana' => ['banana', 4, 'bana', 2],
            '4 sized PAPAIA' => ['PAPAIA', 5, 'PAPAI', 2],
            '0 sized melon' => ['melon', 0, '', 0],
            '1 sized abc' => ['aab', 2, 'aa', 2],
        ];
    }

    /**
     * @test
     * @dataProvider getWordsWithSmallerSizeParameter
     */
    public function givenAGreaterWordThanSizeParameter_whenCountingACharacters_thenGetRidOfExtraWordSize(
        string $wordToBeProcessed,
        int $sizeParameter,
        string $expectedWordAfterReplication,
        int $expectedACharacterCount
    ): void
    {
        $countingMessage = $this->countAllACharactersIn($wordToBeProcessed, $sizeParameter);

        $expectedCountingMessage = "Existem $expectedACharacterCount letras 'a' na palavra $expectedWordAfterReplication.";
        Assert::assertEquals($expectedCountingMessage, $countingMessage);
    }

    private function countAllACharactersIn(string $word, int $sizeToBeProcessed): string
    {
        return exec("php -f /var/www/html/count-a/index.php '$word' '$sizeToBeProcessed'");
    }
}
