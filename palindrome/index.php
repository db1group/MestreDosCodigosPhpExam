<?php

$phrase = $argv[1];
$noBlank = str_replace([' ', '-'], [''], $phrase);
$normalized = strtolower($noBlank);

echo $normalized === strrev($normalized)
    ? $phrase
    : '';