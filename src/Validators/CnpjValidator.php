<?php

namespace JC\BrDocs\Validators;

use JC\BrDocs\Helpers\StringHelper;
use JC\BrDocs\Traits\GeneratorTrait;

/**
 * Class CnpjValidator
 * @package JC\BrDocs\Validators
 */
class CnpjValidator
{
    use GeneratorTrait;

    /**
     * @param $document
     * @return bool
     */
    public static function validate($document)
    {
        $cnpj = StringHelper::numbersOnly($document);

        if (strlen($cnpj) != 14) {
            return false;
        }

        $digits = substr($cnpj, 0, 12);

        $firstVerifierDigit = self::generateCnpjVerifierDigit($digits);
        $secondVerifierDigit = self::generateCnpjVerifierDigit($digits . $firstVerifierDigit);

        $generated = $digits . $firstVerifierDigit . $secondVerifierDigit;
        
        if ($generated != $cnpj) {
            return false;
        }

        return true;
    }
}