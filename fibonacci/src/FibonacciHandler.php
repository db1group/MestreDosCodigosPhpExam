<?php

namespace Fibonacci;

class FibonacciHandler
{
    public function resolve($inputNumber): int
    {
        $V5 = sqrt(5);
        $Phi = (1 + $V5) / 2;
        $iPhi = -1 / $Phi;

        return round((pow($Phi, $inputNumber) - pow($iPhi, $inputNumber)) / $V5);
    }
}
