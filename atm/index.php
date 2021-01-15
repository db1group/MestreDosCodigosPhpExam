<?php

require_once dirname(__FILE__) . '/../vendor/autoload.php';

echo (new \Atm\AtmHandler())->resolve($argv[1]);
