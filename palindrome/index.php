<?php

require_once dirname(__FILE__) . '/../vendor/autoload.php';

echo (new \Palindrome\PalindromeHandler())->resolve($argv[1]);
