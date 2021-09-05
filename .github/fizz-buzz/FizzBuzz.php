<?php

namespace MestreCodigo\FizzBuzz;

class FizzBuzz {

    public function identifyText(int $value): string {
        $byThree = $value % 3 == 0;
        $byFive = $value % 5 == 0;

        $return = '';

        if ($byThree) {
            $return .= 'Fizz';
        }

        if ($byFive) {
            $return .= 'Buzz';
        }

        if ($return == '') {
            $return = $value;
        }

        return $return;
    }
}
