<?php

require_once dirname(__FILE__) . '/../vendor/autoload.php';

echo (new \Fibonacci\FibonacciHandler())->resolve($argv[1]);
