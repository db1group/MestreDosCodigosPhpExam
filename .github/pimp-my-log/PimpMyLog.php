<?php

namespace MestreCodigo\PimpMyLog;

class PimpMyLog {

    public function replaceConfidentialData(string $data): string {
        $result = $this->replaceIP($data);
        $result = $this->replaceCreditCard($result);
        $result = $this->replaceCVV($result);
        $result = $this->replaceExpDate($result);
        $result = $this->replaceExpirationDate($result);

        return $result;
    }

    private function replaceIP(string $data): string {
        $ipPattern = '/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/';
        return preg_replace($ipPattern, '***.***.***.***', $data);
    }

    private function replaceCreditCard(string $data): string {
        $creditCardPattern = '/(card) (\d{4}) \d{4} \d{4} (\d{4})/';
        return preg_replace($creditCardPattern, '$1 $2 **** **** $3', $data);
    }

    private function replaceCVV(string $data): string {
        $cvvPattern = '/(cvv:?) \d+/i';
        return preg_replace($cvvPattern, '$1 ***', $data);
    }

    private function replaceExpDate(string $data): string {
        $cvvPattern = '/(exp date:?) \d{1,2}\/\d{2,4}/';
        return preg_replace($cvvPattern, '$1 **/****', $data);
    }

    private function replaceExpirationDate(string $data): string {
        $cvvPattern = '/(expiration date:?) \d{1,2}\/\d{2,4}/';
        return preg_replace($cvvPattern, '$1 **/****', $data);
    }
}
