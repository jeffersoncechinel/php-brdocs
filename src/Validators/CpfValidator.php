<?php

namespace JC\BrDocs\Validators;

use JC\BrDocs\Helpers\StringHelper;
use JC\BrDocs\Traits\CpfTrait;

/**
 * Class Cpf
 * @package JC\BrDocs\Validators
 */
class CpfValidator
{
    use CpfTrait;

    /**
     * @param $document
     * @return bool
     */
    public static function validate($document)
    {
        $cpf = StringHelper::numbersOnly($document);

        if (mb_strlen($cpf) != 11) {
            return false;
        }

        $digits = substr($cpf, 0, 9);

        $firstVerifierDigit = self::generateCpfVerifierDigit($digits);
        $secondVerifierDigit = self::generateCpfVerifierDigit($digits . $firstVerifierDigit);

        $generated = $digits . $firstVerifierDigit . $secondVerifierDigit;

        if ($generated != $cpf) {
            return false;
        }

        return true;
    }
}
