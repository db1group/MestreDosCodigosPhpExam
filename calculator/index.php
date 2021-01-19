<?php

require_once dirname(__FILE__) . '/src/EquationCalculator.php';

echo (new EquationCalculator())->resolve($argv[1]) . PHP_EOL;