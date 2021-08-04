<?php
include_once("variable.php");

// Referência: https://www.php.net/manual/pt_BR/language.variables.basics.php

$questions[0][0] = 'A';
$questions[0][1] = '$escudeiro';

$questions[1][0] = 'B';
$questions[1][1] = '$1mestre';

$questions[2][0] = 'C';
$questions[2][1] = '$_cavaleiro';

$questions[3][0] = 'D';
$questions[3][1] = '$__codigo';

$questions[4][0] = 'E';
$questions[4][1] = '$mestre@codigo';

$questions[5][0] = 'F';
$questions[5][1] = '$mestre1';

$questions[6][0] = 'G';
$questions[6][1] = '$escudeiro-1';

$questions[7][0] = 'H';
$questions[7][1] = '$mestreDosCodigos';

$questions[8][0] = 'I';
$questions[8][1] = '$db1_';

$var = new Variable();
$result = "";

foreach ($questions as $question) {
    $questionLetter = $question[0];
    $questionValue = $question[1];

    if (!$var->validateName($questionValue)){
        $result .= "$questionLetter ";
    }
}
echo trim($result);
?>