<?php

include_once('Calculator.php');

use MestreCodigo\Calculator\Calculator;

$equation = $argv[1];
$calculator = new Calculator();

echo $calculator->calculate($equation);
