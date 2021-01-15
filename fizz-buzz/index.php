<?php

require_once dirname(__FILE__) . '/../vendor/autoload.php';

echo (new \FizzBuzz\FizzBuzzHandler())->resolve($argv[1]);

