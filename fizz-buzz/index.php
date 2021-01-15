<?php

require_once dirname(__FILE__) . '/src/FizzBuzzHandler.php';

echo (new FizzBuzzHandler())->resolve($argv[1]);
