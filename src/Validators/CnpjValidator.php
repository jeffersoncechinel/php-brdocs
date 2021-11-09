<?php

namespace JC\BrDocs\Validators;

use JC\BrDocs\Helpers\StringHelper;
use JC\BrDocs\Traits\CnpjTrait;

/**
 * Class CnpjValidator
 * @package JC\BrDocs\Validators
 */
class CnpjValidator
{
    use CnpjTrait;

    /**
     * @param $document
     * @return bool
     */
    public static function validate($document)
    {
        $cnpj = StringHelper::numbersOnly($document);

        if (mb_strlen($cnpj) != 14) {
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
