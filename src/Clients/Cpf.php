<?php

namespace JC\BrDocs\Clients;

use JC\BrDocs\Formatters\CpfFormatter;
use JC\BrDocs\Helpers\StringHelper;
use JC\BrDocs\Validators\CpfValidator;

/**
 * Class Cpf
 * @package JC\BrDocs\Validators
 */
class Cpf
{
    public static function normalize($document)
    {
        $document = StringHelper::numbersOnly($document);
        $document = sprintf('%011d', $document);

        return $document;
    }

    public function validate($document)
    {
        return CpfValidator::validate($document);
    }

    public function format($document)
    {
        return CpfFormatter::format($document);
    }
}