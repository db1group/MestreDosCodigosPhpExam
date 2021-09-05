<?php

include_once('FizzBuzz.php');

use MestreCodigo\FizzBuzz\FizzBuzz;

$value = $argv[1];
$fizzBuzz = new FizzBuzz();
echo $fizzBuzz->identifyText($value);
