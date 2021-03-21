<?php

$input = $argv[1];

$ip = '/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/';
$creditCard = '/(\d{4}) \d{4} \d{4} (\d{4})/';
$cvv = '/(cvv:?) \d+/i';
$expiration = '/(date:?) \d{1,2}\/\d{2,4}/i';

$input = preg_replace($ip, '***.***.***.***', $input);
$input = preg_replace($creditCard, '$1 **** **** $2', $input);
$input = preg_replace($cvv, '$1 ***', $input);
$input = preg_replace($expiration, '$1 **/****', $input);

echo $input;