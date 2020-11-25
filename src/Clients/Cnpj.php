<?php

namespace JC\BrDocs\Clients;

use JC\BrDocs\helpers\StringHelper;
use JC\BrDocs\Formatters\CnpjFormatter;
use JC\BrDocs\Validators\CnpjValidator;

/**
 * Class Cpf
 * @package JC\BrDocs\Validators
 */
class Cnpj
{
    public static function normalize($document)
    {
        $document = StringHelper::numbersOnly($document);
        $document = sprintf('%014d', $document);

        return $document;
    }

    public function validate($document)
    {
        return CnpjValidator::validate($document);
    }

    public function format($document)
    {
        return CnpjFormatter::format($document);
    }
}