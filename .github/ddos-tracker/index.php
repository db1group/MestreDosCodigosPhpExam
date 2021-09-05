<?php

include_once("DDOSTracker.php");

use MestreCodigo\DDOSTracker\DDOSTracker;

$receiveDatetime = $argv[1];
$ddosTracker = new DDOSTracker();
echo $ddosTracker->findPossibleTimezoneName($receiveDatetime);
