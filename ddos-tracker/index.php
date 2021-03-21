<?php

$time = $argv[1];
$timezones = timezone_identifiers_list();

foreach ($timezones as $tz) {
    $attacker = new DateTime($time);
    $candidate = new DateTime('now', new DateTimeZone($tz));


    if (
        $attacker->format('d') - $candidate->format('d') == 0
        && $attacker->format('H') - $candidate->format('H') == 0
    ) {
        echo $tz;
        break;
    }
}