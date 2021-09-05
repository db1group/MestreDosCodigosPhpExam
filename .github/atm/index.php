<?php

include_once('Atm.php');

use MestreCodigo\Atm\Atm;

$withdrawalAmount = $argv[1];

$atm = new Atm();
echo $atm->getCalculateMoneyBills($withdrawalAmount);