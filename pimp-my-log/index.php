<?php

const IP_ADDRESS_REGEX_PATTERN = '/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/';
const CREDIT_CARD_REGEX_PATTERN = '/(\d{4}) \d{4} \d{4} (\d{4})/';
const CVV_REGEX_PATTERN = '/(cvv:?) \d+/i';
const EXP_DATE_REGEX_PATTERN = '/(exp date:?) \d{1,2}\/\d{2,4}/';

$logMessage = $argv[1];

$logMessage = preg_replace(IP_ADDRESS_REGEX_PATTERN, '***.***.***.***', $logMessage);
$logMessage = preg_replace(CREDIT_CARD_REGEX_PATTERN, '$1 **** **** $2', $logMessage);
$logMessage = preg_replace(CVV_REGEX_PATTERN, '$1 ***', $logMessage);
$logMessage = preg_replace(EXP_DATE_REGEX_PATTERN, '$1 **/****', $logMessage);

echo $logMessage;