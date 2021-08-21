<?php
namespace Test\MestreCodigo\Palindrome;

include_once("./palindrome/palindrome.php");

use MestreCodigo\Palindrome\Palindrome;
use PHPUnit\Framework\TestCase;

/**
 * @covers Palindrome
 */
class PalindromeTest extends TestCase
{
    private $palindrome;

    protected function setUp(): void
    {
        $this->palindrome = new Palindrome();
    }

    /**
     * @testWith ["A grama é amarga", true]
     *           ["A miss é péssima", true]
     *           ["A mala nada na lama", true]
     *           ["ovo", true]
     *           ["O teu drama é amar Dueto", true]
     *           ["A base do teto desaba", true]
     *           ["Seco de raiva, coloco no colo caviar e doces", true]
     *           ["uma frase qualquer", false]
     */
    public function testIsPalindrome(string $phrase, bool $expectedValue): void
    {
        $isPalindrome = $this->palindrome->isPalindrome($phrase);

        self::assertEquals($expectedValue, $isPalindrome, "Test Fail in phrase $phrase.");
    }
}
