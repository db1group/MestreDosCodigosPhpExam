<?php

require_once dirname(__FILE__) . '/../vendor/autoload.php';

echo (new \Calculator\EquationCalculator())->resolve($argv[1]) . PHP_EOL;