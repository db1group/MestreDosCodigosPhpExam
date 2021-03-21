<?php

$salt = getenv('HASH_SALTING_VALUE');
$value = $argv[1];
echo hash('SHA256', $value . $salt);