<?php

include_once('PimpMyLog.php');

use MestreCodigo\PimpMyLog\PimpMyLog;

$inputData = $argv[1];

$pimpMyLog = new PimpMyLog();
echo $pimpMyLog->replaceConfidentialData($inputData);
