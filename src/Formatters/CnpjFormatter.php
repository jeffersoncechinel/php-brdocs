<?php

namespace JC\BrDocs\Formatters;

use JC\BrDocs\Helpers\StringHelper;

/**
 * Class CnpjFormatter
 * @package JC\BrDocs\Formatters
 */
class CnpjFormatter
{
    public static function format($document)
    {
        return StringHelper::applyMask('##.###.###/####-##', $document);
    }
}