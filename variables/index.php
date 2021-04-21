<?php

require_once __DIR__ . '/src/entities/Variable.php';
require_once __DIR__ . '/src/exceptions/InvalidVariableNameException.php';
require_once __DIR__ . '/src/validators/VariableNameValidator.php';

$quest_options = [
    'A' => '$escudeiro',
    'B' => '$1mestre',
    'C' => '$_cavaleiroo',
    'D' => '$_cavaleiro',
    'E' => '$mestre@codigo',
    'F' => '$mestre1',
    'G' => '$escudeiro-1',
    'H' => '$mestreDosCodigos',
    'I' => '$db1_',
];

$answer = '';

foreach ($quest_options as $option => $variable_name) {
    try {
        $variable = new \App\variables\src\entities\Variable($variable_name);
    } catch (\App\variables\src\exceptions\InvalidVariableNameException $exception) {
        $answer .= $option;
    }
}

echo implode(' ', str_split($answer));