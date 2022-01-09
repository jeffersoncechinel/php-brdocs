<?php

namespace JC\BrDocs\Traits;

/**
 * Trait CpfTrait
 * @package JC\BrDocs\Traits
 */
trait CpfTrait
{
    /**
     * @param $digits
     * @return int
     */
    public static function generateCpfVerifierDigit($digits)
    {
        $sum = 0;

        $positions = [];
        
        // first digit
        if (mb_strlen($digits) + 1 == 10) {
            $positions = [10, 9, 8, 7, 6, 5, 4, 3, 2];
        }

        // second digit
        if (mb_strlen($digits) + 1 == 11) {
            $positions = [11, 10, 9, 8, 7, 6, 5, 4, 3, 2];
        }
        
        for ($i = 0; $i < mb_strlen($digits); $i++) {
            $sum += $digits[$i] * $positions[$i];
        }

        $digit = $sum % 11;
        $digit = 11 - $digit;

        if ($digit > 9) {
            $digit = 0;
        }

        return $digit;
    }
}
