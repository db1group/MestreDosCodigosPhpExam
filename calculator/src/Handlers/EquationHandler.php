<?php

namespace Calculator\Handlers;

interface EquationHandler
{
    public function __construct(?EquationHandler $nextEquationHandler);

    public function calculate(float $firstNumber, string $operator, float $secondNumber): string;
}
