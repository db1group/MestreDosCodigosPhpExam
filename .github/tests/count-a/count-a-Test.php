<?php
include_once("./count-a/count-a.php");

use PHPUnit\Framework\TestCase;

/**
 * @covers CountA
 */
class CountATest extends TestCase {
    private $countA;

    protected function setUp(): void
    {
        $this->countA = new CountA();    
    }

    /**
    * @testWith ["aba", 10, 7]
    *           ["medico", 15, 0]
    *           ["cachorro", 2, 1]
    */
    public function testCountLetterAInWord(string $word, int $wordSize, int $expectedCountLetterA): void
    {
    $countResult = $this->countA->countLetterA($word, $wordSize);

    self::assertEquals($expectedCountLetterA, $countResult, "Test fail in word $word");
    }    
}
