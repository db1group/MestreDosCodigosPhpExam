<?php

$string = $argv[1];
$size = $argv[2];
$word = '';

if (strlen($string) < $size) {
    $word = str_pad($string, $size, $string);
}

if (strlen($string) >= $size) {
    $word = substr($string, 0, $size);
}

$count = substr_count(strtolower($word), 'a');

echo $count == 1
    ? "Existe 1 letra 'a' na palavra $word."
    : "Existem $count letras 'a' na palavra $word.";
