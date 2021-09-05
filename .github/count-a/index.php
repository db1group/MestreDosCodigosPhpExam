<?php

include_once("CountA.php");

use MestreCodigo\CountA\CountA;

$word = $argv[1];
$wordSize = $argv[2];

$countA = new CountA();
echo $countA->generateMessage($word, $wordSize);
