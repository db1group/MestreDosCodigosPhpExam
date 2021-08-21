<?php
require_once('palindrome.php');

use MestreCodigo\Palindrome\Palindrome;

$phrase = $argv[1];
$palindrome = new Palindrome();

if ($palindrome->isPalindrome($phrase)) {
    echo $phrase;
} else {
    echo '';
}
