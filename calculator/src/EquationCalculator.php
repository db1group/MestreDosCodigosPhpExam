<?php

require_once dirname(__FILE__) . '/Handlers/DivisionHandler.php';
require_once dirname(__FILE__) . '/Handlers/MultiplicationHandler.php';
require_once dirname(__FILE__) . '/Handlers/SubtractionHandler.php';
require_once dirname(__FILE__) . '/Handlers/SumHandler.php';

class EquationCalculator
{
    const FIRST_NUMBER = 0;
    const OPERATOR = 1;
    const SECOND_NUMBER = 2;

    public function resolve(string $equation): string
    {
        $equationParams = explode(' ', $equation);

        while(count($equationParams) !== 3) {
            $equation = $this->resolveComplexEquation($equation);
            $equationParams = explode(' ', $equation);
        }

        return $this->resolveSimpleEquation(
            $equationParams[self::FIRST_NUMBER],
            $equationParams[self::OPERATOR],
            $equationParams[self::SECOND_NUMBER]
        );
    }

    private function resolveSimpleEquation(float $firstNumber, string $operator, float $secondNumber): string
    {
        return
            (new MultiplicationHandler(
                new DivisionHandler(
                    new SubtractionHandler(
                        new SumHandler(null)
                    )
                )
            ))->calculate($firstNumber, $operator, $secondNumber);
    }

    private function getOperatorsByEquation(array $equationParams): array
    {
        return array_filter($equationParams, function ($key) {
            return $key % 2 === 1;
        }, ARRAY_FILTER_USE_KEY);
    }

    private function resolveComplexEquation(string $equation): string
    {
        $equationsToResolve = $this->getEquationsToResolve($equation);
        $firstEquation = $this->getTheFirstEquationToResolve($equationsToResolve);

        $equationParams = explode(' ', $firstEquation);

        $equationResult = $this->resolveSimpleEquation(
            $equationParams[self::FIRST_NUMBER],
            $equationParams[self::OPERATOR],
            $equationParams[self::SECOND_NUMBER]
        );

        return $this->generateNewEquation($firstEquation, $equationResult, $equation);
    }

    private function getTheFirstEquationToResolve(array $equationToResolve): string
    {
        $orderedEquations = [];
        $operatorsOrder = ['/', '*', '-', '+'];

        foreach ($operatorsOrder as $operator) {
            if (array_key_exists($operator, $equationToResolve)) {
                $orderedEquations[$operator] = $equationToResolve[$operator];
            }
        }

        return array_shift($orderedEquations);
    }

    private function getEquationsToResolve(string $equation): array
    {
        $equationParams = explode(' ', $equation);
        $equationToResolve = [];

        $operators = $this->getOperatorsByEquation($equationParams);

        foreach ($equationParams as $key => $param) {
            $nextEquationParam = $equationParams[$key + 1];

            if (in_array($nextEquationParam, $operators)) {
                $nextNumberEquation = $equationParams[$key + 2];

                $equationToResolve[$nextEquationParam] = "$param $nextEquationParam $nextNumberEquation";
            }
        }

        return $equationToResolve;
    }

    private function generateNewEquation(string $firstEquation, string $equationResult, string $equation): string
    {
        return str_replace($firstEquation, $equationResult, $equation);
    }
}
