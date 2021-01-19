<?php

class AtmHandler
{
    const EXISTING_NOTES = [
        100,
        50,
        20,
        10,
        5,
        1
    ];

    public function resolve(int $inputValue): string
    {
        if($inputValue < 1) {
            return 'Este valor não é válido';
        }

        $notesToWithdraw = [];

        foreach(self::EXISTING_NOTES as $noteValue) {
            if ($inputValue >= $noteValue) {
                $notesToWithdraw[$noteValue] = floor($inputValue / $noteValue);
                $inputValue %= $noteValue;
            }
        }

        $withdrawResult = $this->getNotesToWithdrawFormatted($notesToWithdraw);

        return "[$withdrawResult]";
    }

    private function getNotesToWithdrawFormatted(array $notesToWithdraw): string
    {
        $formattedWithdraw = '';

        foreach($notesToWithdraw as $withdrawBill => $withdrawQuantity) {
            $formattedWithdraw .= "$withdrawBill => $withdrawQuantity, ";
        }

        return substr($formattedWithdraw, 0, -2);
    }
}
