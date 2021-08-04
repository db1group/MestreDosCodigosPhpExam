<?php

include_once("count-a.php");

$word = $argv[1];
$wordSize = $argv[2];

$countA = new CountA();
echo $countA->generateMessage($word, $wordSize);
?>