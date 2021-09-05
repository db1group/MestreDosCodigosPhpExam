<?php

namespace MestreCodigo\CountA;

class CountA {

    private $wordPrepared;

    function countLetterA(string $word, int $wordSize): int {

        if (strlen($word) > $wordSize){
            $this->wordPrepared = substr($word, 0, $wordSize);
        } else{
            $this->wordPrepared = str_pad($word, $wordSize, $word); 
        }

        return substr_count(strtolower($this->wordPrepared), 'a');
    }

    function generateMessage(string $word, int $wordSize): string {
        $count = $this->countLetterA($word, $wordSize);

        if ($count == 1) {
            return "Existe 1 letra 'a' na palavra $this->wordPrepared.";
        }

        return "Existem $count letras 'a' na palavra $this->wordPrepared.";
    }    
}
