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
    public function cpf(string $document)
    {
        return new Cpf($document);
    }

    /**
     * @param $document
     * @return Cnpj
     */
    public function cnpj($document)
    {
        return new Cnpj($document);
    }

    /**
     * @param $document
     * @return Cnpj|Cpf
     */
    public function cpfCnpj($document)
    {
        if ($this->isCpf($document)) {
            return new CPf($document);
        }

        return new Cnpj($document);
    }

    /**
     * @param $document
     * @return bool
     */
    public function isCpf($document)
    {
        $document = StringHelper::numbersOnly($document);
        
        if (mb_strlen($document) <= 11) {
            return true;
        }

        return false;
    }
}