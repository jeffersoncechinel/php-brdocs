<?php

namespace JC\BrDocs;

use JC\BrDocs\Clients\Cnpj;
use JC\BrDocs\Clients\Cpf;

/**
 * Class BrDoc
 * @package JC\BrDocs
 */
class BrDoc
{
    public function cpf(string $document)
    {
        return new Cpf($document);
    }

    public function cnpj($document)
    {
        return new Cnpj($document);
    }
}