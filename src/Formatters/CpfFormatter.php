<?php

namespace JC\BrDocs\Formatters;

use JC\BrDocs\Helpers\StringHelper;

/**
 * Class CpfFormatter
 * @package JC\BrDocs\Formatters
 */
class CpfFormatter
{
    /**
     * @param string $document
     * @return mixed
     */
    public static function format(string $document)
    {
        return StringHelper::applyMask('###.###.###-##', $document);
    }
}