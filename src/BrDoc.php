<?php

namespace JC\BrDocs;

use JC\BrDocs\Clients\Cnpj;
use JC\BrDocs\Clients\Cpf;
use JC\BrDocs\Helpers\StringHelper;

/**
 * Class BrDoc
 * @package JC\BrDocs
 */
class BrDoc
{
    /**
     * @param string $document
     * @return Cpf
     */
    public static function cpf(string $document)
    {
        return new Cpf($document);
    }

    /**
     * @param $document
     * @return Cnpj
     */
    public static function cnpj(string $document)
    {
        return new Cnpj($document);
    }

    /**
     * @param $document
     * @return Cnpj|Cpf
     */
    public static function cpfCnpj(string $document)
    {
        if (self::isCpf($document)) {
            return new CPf($document);
        }

        return new Cnpj($document);
    }

    /**
     * @param $document
     * @return bool
     */
    protected static function isCpf(string $document)
    {
        $document = StringHelper::numbersOnly($document);
        
        if (mb_strlen($document) <= 11) {
            return true;
        }

        return false;
    }
}