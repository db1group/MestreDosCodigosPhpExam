<?php

namespace Palindrome;

class PalindromeHandler
{
    public function resolve($palindrome): string
    {
        $phraseWithoutSpaces = str_replace(' ', '', $palindrome);
        $invertPhrase = strrev($phraseWithoutSpaces);

        if ($phraseWithoutSpaces === $invertPhrase) {
            return $palindrome;
        }

        return '';
    }
}
