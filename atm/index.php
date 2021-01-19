<?php

require_once dirname(__FILE__) . '/src/AtmHandler.php';

echo (new AtmHandler())->resolve($argv[1]);
