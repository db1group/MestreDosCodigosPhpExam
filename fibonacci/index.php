<?php

$n = $argv[1];
$actual = 0;
$prevNear = 1;
$prevFar = 0;

for ($i = 1; $i <= $n; $i++) {
    $prevFar = $prevNear;
    $prevNear = $actual;
    $actual = $prevNear + $prevFar;
}

echo $actual;