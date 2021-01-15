<?php

require_once dirname(__FILE__) . '/src/PalindromeHandler.php';

echo (new PalindromeHandler())->resolve($argv[1]);
