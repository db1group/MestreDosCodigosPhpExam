<?php

require_once dirname(__FILE__) . '/../vendor/autoload.php';

echo (new \DDosTracker\DDosTrackerHandler())->resolve($argv[1]);
