<?php

namespace JC\BrDocs\Traits;

/**
 * Trait CnpjTrait
 * @package JC\BrDocs\Traits
 */
trait CnpjTrait
{
    /**
     * @param $digits
     * @return int
     */
    public static function generateCnpjVerifierDigit($digits)
    {
        $sum = 0;

        $positions = [];
        
        // first digit
        if (mb_strlen($digits) == 12) {
            $positions = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        }

        // second digit
        if (mb_strlen($digits) == 13) {
            $positions = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        }

        for ($i = 0; $i < mb_strlen($digits); $i++) {
            $sum += $digits[$i] * $positions[$i];
        }

        $digit = $sum % 11;

        if ($digit < 2) {
            $digit = 0;
        } else {
            $digit = 11 - $digit;
        }

        return $digit;
    }
}
