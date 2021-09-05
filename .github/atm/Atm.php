<?php

namespace MestreCodigo\Atm;

class Atm {

    function getCalculateMoneyBills(int $valueOriginal): string {
        if ($valueOriginal == 0) {
            return 'Este valor não é válido';
        }

        $moneyBillValue = 0;
        $calculatedValue = $valueOriginal;
        $moneyBillText = '';

        while ($calculatedValue > 0) {
            if ($calculatedValue >= 100) {
                $moneyBillValue = 100;
            } elseif ($calculatedValue >= 50) {
                $moneyBillValue = 50;
            } elseif ($calculatedValue >= 20) {
                $moneyBillValue = 20;
            } elseif ($calculatedValue >= 10) {
                $moneyBillValue = 10;
            } elseif ($calculatedValue >= 5) {
                $moneyBillValue = 5;
            } elseif ($calculatedValue >= 1) {
                $moneyBillValue = 1;
            }

            $format = ', %d => %d';
            $amountOfBills =intdiv($calculatedValue, $moneyBillValue);
            $moneyBillText = $moneyBillText . sprintf($format, $moneyBillValue, $amountOfBills);

            $calculatedValue = $calculatedValue % $moneyBillValue;
        }
        $moneyBillText = substr($moneyBillText, 2, strlen($moneyBillText));
        return '[' . $moneyBillText . ']';
    }
}
