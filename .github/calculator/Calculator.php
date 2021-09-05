<?php

namespace MestreCodigo\Calculator;

class Calculator {

    public function calculate(string $equation): string {
        $terms = explode(' ', $equation);

        try {
            $resolvedTerms = $this->resolvePriorityOperator($terms);
        }
        catch (\DivisionByZeroError $e) {
            return 'Erro de divisão por';
        }
        $calculated = $this->finalCalculate($resolvedTerms);

        $final = (float)$calculated[0];
        return number_format($final, 2, '.', '');
    }

    private function resolvePriorityOperator(array $terms): array {
        for ($i = 0; $i <= count($terms); $i++) {
            if ($terms[$i] == '/' || $terms[$i] == '*') {

                $operator = $terms[$i];
                $firstValue = $terms[$i - 1];
                $secondValue = $terms[$i + 1];

                if ($operator == '/') {
                    $calculatedValue = $this->calculateDivision($firstValue, $secondValue);
                } else {
                    $calculatedValue = $this->calculateMultiplication($firstValue, $secondValue);
                }

                $terms = array_replace($terms, array($i - 1 => $calculatedValue));
                array_splice($terms, $i, 2);

                $i--;
            }
        }
        return $terms;
    }

    private function finalCalculate(array $terms): array {
        for ($i = 0; $i <= count($terms); $i++) {
            if ($terms[$i] == '+' || $terms[$i] == '-' || $terms[$i] == '–') {

                $operator = $terms[$i];
                $firstValue = $terms[$i - 1];
                $secondValue = $terms[$i + 1];

                if ($operator == '+') {
                    $calculatedValue = $this->calculateAddition($firstValue, $secondValue);
                } else {
                    $calculatedValue = $this->calculateSubtraction($firstValue, $secondValue);
                }

                $terms = array_replace($terms, array($i - 1 => $calculatedValue));
                array_splice($terms, $i, 2);

                $i--;
            }
        }
        return $terms;
    }

    private function calculateDivision(float $firstValue, float $secondValue): float {
        if ($secondValue == 0) {
            throw new \DivisionByZeroError();
        }

        return $firstValue / $secondValue;
    }

    private function calculateMultiplication(float $firstValue, float $secondValue): float {
        return $firstValue * $secondValue;
    }

    private function calculateAddition(float $firstValue, float $secondValue): float {
        return $firstValue + $secondValue;
    }

    private function calculateSubtraction(float $firstValue, float $secondValue): float {
        return $firstValue - $secondValue;
    }
}
