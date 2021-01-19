<?php

$saltingValue = getenv('HASH_SALTING_VALUE');
$fullValueForHashing = $argv[1] . $saltingValue;

echo hash('sha256', $fullValueForHashing);