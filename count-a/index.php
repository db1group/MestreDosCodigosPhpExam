<?php

require_once dirname(__FILE__) . '/src/CountAHandler.php';

echo (new CountAHandler($argv[1], $argv[2]))->resolve();
