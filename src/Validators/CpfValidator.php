<?php

namespace JC\BrDocs\Validators;

use JC\BrDocs\Helpers\StringHelper;
use JC\BrDocs\Traits\GeneratorTrait;

/**
 * Class Cpf
 * @package JC\BrDocs\Validators
 */
class CpfValidator
{
    use GeneratorTrait;

    public static function validate($document)
    {
        $cpf = StringHelper::numbersOnly($document);

        if (strlen($cpf) != 11) {
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