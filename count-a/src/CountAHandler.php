<?php

namespace CountA;

class CountAHandler
{
    private $wordArgument;
    private $wordSizeArgument;

    public function __construct(string $wordArgument, int $wordSizeArgument)
    {
        $this->wordArgument = $wordArgument;
        $this->wordSizeArgument = $wordSizeArgument;
    }

    public function resolve(): string
    {
        $generatedWord = $this->generateWordWithFinalSize();
        $characterArray = $this->transformWordInCharacterArray($generatedWord);

        $initialCount = 0;

        $totalCharactersA = array_reduce($characterArray, function (int $counter, string $character) {
            if ($character === 'a' | $character === 'A') {
                $counter++;
            }

            return $counter;
        }, $initialCount);

        return $this->generateReturnMessage($generatedWord, $totalCharactersA);
    }

    private function generateWordWithFinalSize(): string
    {
        $wordSize = strlen($this->wordArgument);

        if ($wordSize < $this->wordSizeArgument) {
            return str_pad($this->wordArgument, $this->wordSizeArgument, $this->wordArgument);
        }

        return substr($this->wordArgument, 0, $this->wordSizeArgument);
    }

    private function transformWordInCharacterArray(string $generatedWord): array
    {
        return str_split($generatedWord);
    }

    private function generateReturnMessage(string $generatedWord, int $totalCharactersA): string
    {
        if ($totalCharactersA === 1) {
            return "Existe 1 letra 'a' na palavra $generatedWord.";
        }

        return "Existem $totalCharactersA letras 'a' na palavra $generatedWord.";
    }
}
