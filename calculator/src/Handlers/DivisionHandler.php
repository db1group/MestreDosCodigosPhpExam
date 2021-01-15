<?php

namespace Calculator\Handlers;

class DivisionHandler implements EquationHandler
{
    const OPERATOR = '/';
    private $nextEquationHandler;

    public function __construct(?EquationHandler $nextEquationHandler)
    {
        $this->nextEquationHandler = $nextEquationHandler;
    }

    public function calculate(float $firstNumber, string $operator, float $secondNumber): string
    {
        if (self::canHandlerEquation($operator)) {
            if ($secondNumber == 0) {
                return 'Erro de divisão por';
            }

            return $this->formattedNumber($firstNumber / $secondNumber);
        }

        if ($this->hasNextEquationHandler()) {
            return $this->nextEquationHandler->calculate($firstNumber, $operator, $secondNumber);
        }

        throw new \InvalidArgumentException('This Operator not exists.');
    }

    private static function canHandlerEquation(string $operator): bool
    {
        return $operator === self::OPERATOR;
    }

    private function hasNextEquationHandler(): bool
    {
        return !is_null($this->nextEquationHandler);
    }

    private function formattedNumber(float $resultNumber): string
    {
        return number_format($resultNumber, 2, '.', '');
    }
}