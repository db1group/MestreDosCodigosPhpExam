<?php

$value = $argv[1];

if ($value % 3 != 0 && $value % 5 != 0) {
    echo $value;
    return;
}

if ($value % 3 == 0) {
    echo 'Fizz';
}

if ($value % 5 == 0) {
    echo 'Buzz';
}