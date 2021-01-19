<?php

class FizzBuzzHandler
{
    public function resolve(int $inputNumber): string
    {
        if ($inputNumber % 15 === 0) {
            return 'FizzBuzz';
        }

        if ($inputNumber % 3 === 0) {
            return 'Fizz';
        }

        if ($inputNumber % 5 === 0) {
            return 'Buzz';
        }

        return $inputNumber;
    }
}
