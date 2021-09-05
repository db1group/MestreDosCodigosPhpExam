<?php

namespace MestreCodigo\Fibonacci;

class Fibonacci {

    public function getNthValue(int $n): int {
        if ($n == 0) {
            return 0;
        }

        $a = 1;
        $b = 0;
        $count = 1;

        while ($count < $n) {
            $num = $a + $b;
            $b = $a;
            $a = $num;
            $count++;
        }

        return $a;
    }
}