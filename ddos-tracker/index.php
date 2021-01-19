<?php

require_once dirname(__FILE__) . '/src/DDosTrackerHandler.php';

echo (new DDosTrackerHandler())->resolve($argv[1]);
