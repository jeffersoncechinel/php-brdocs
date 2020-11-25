<?php

namespace JC\BrDocs\Traits;

/**
 * Trait GeneratorTrait
 * @package JC\BrDocs\Traits
 */
trait GeneratorTrait
{
    public static function generateCpfVerifierDigit($digits)
    {
        $sum = 0;

        // first digit
        if (strlen($digits) + 1 == 10) {
            $positions = [10, 9, 8, 7, 6, 5, 4, 3, 2];
        }

        // second digit
        if (strlen($digits) + 1 == 11) {
            $positions = [11, 10, 9, 8, 7, 6, 5, 4, 3, 2];
        }

        for ($i = 0; $i < strlen($digits); $i++) {
            $sum += $digits[$i] * $positions[$i];
            $positions--;
        }

        $digit = $sum % 11;
        $digit = 11 - $digit;

        if ($digit > 9) {
            $digit = 0;
        }

        return $digit;
    }

    public static function generateCnpjVerifierDigit($digits)
    {
        $sum = 0;

        // first digit
        if (strlen($digits) == 12) {
            $positions = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        }

        // second digit
        if (strlen($digits) == 13) {
            $positions = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        }

        for ($i = 0; $i < strlen($digits); $i++) {
            $sum += $digits[$i] * $positions[$i];
            $positions--;
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