<?php
$inputValue = $argv[1];
echo hash('SHA256', $inputValue . getenv('HASH_SALTING_VALUE'));
