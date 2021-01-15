<?php

require_once dirname(__FILE__) . '/../vendor/autoload.php';

echo (new \CountA\CountAHandler($argv[1], $argv[2]))->resolve();
