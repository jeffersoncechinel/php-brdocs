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
    public function cpf()
    {
        return new Cpf();
    }

    public function cnpj()
    {
        return new Cnpj();
    }
}