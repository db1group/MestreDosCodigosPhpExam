<?php

function doDivisionAndMultiplication(array $terms, int $index) {
    $operator = $terms[$index] ?? '';

    if (in_array($operator, ['/', '*'])) {
        $left = floatval($terms[$index - 1]);
        $right = floatval($terms[$index + 1]);

        if ($operator == '/') {
            if ($right == 0) {
                return 'Erro de divisão por';
            }

            $terms[$index - 1] = $left / $right;
        }

        if ($operator == '*') {
            $terms[$index - 1] = $left * $right;
        }

        array_splice($terms, $index, 2);
        return doDivisionAndMultiplication($terms, $index);
    }

    if ($index + 2 > count($terms)) {
        return $terms;
    }

    return doDivisionAndMultiplication($terms, $index + 2);
}

function doSubtractionAndSum(array $terms, int $index) {
    $operator = $terms[$index] ?? '';

    if (in_array($operator, ['-', '–', '+'])) {
        $left = floatval($terms[$index - 1]);
        $right = floatval($terms[$index + 1]);

        if ($operator == '-' || $operator == '–') {
            $terms[$index - 1] = $left - $right;
        }

        if ($operator == '+') {
            $terms[$index - 1] = $left + $right;
        }

        array_splice($terms, $index, 2);
        return doSubtractionAndSum($terms, $index);
    }

    if ($index + 2 > count($terms)) {
        return $terms;
    }

    return doSubtractionAndSum($terms, $index + 2);
}

$equation = $argv[1];
$terms = explode(" ", $equation);

$answer = doDivisionAndMultiplication($terms, 1);

if (!is_array($answer)) {
    echo $answer;
    return;
}

$answer = doSubtractionAndSum($answer, 1);
    
if (is_array($answer)) {
    $answer = floatval($answer[0]);
    $answer = number_format($answer, 2, '.', '');
}

echo $answer;