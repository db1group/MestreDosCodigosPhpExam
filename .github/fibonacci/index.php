<?php

include_once('Fibonacci.php');

use MestreCodigo\Fibonacci\Fibonacci;

$position = $argv[1];

$fibonacci = new Fibonacci();
echo $fibonacci->getNthValue($position);