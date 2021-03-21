<?php

$value = $argv[1];

if ($value < 1) {
    echo 'Este valor não é válido';
    return;
}

$money = [100, 50, 20, 10, 5, 1];
$cash = [];

foreach ($money as $m) {
    $cash[$m] = 0;
    
    while ($value >= $m) {
        $cash[$m]++;
        $value -= $m;
    }
}

$output = implode(
    ', ', 
    array_filter(
        array_map(
            function ($v, $k) { return $v > 0 ? sprintf("%s => %s", $k, $v) : ''; },
            $cash,
            array_keys($cash)
        )
    )
);

echo "[$output]";