<?php

namespace JC\BrDocs\Formatters\IeFormatter\States;

use JC\BrDocs\Helpers\StringHelper;

/**
 * Class BA
 * @package JC\BrDocs\Formatters\IeFormatter\States
 */
class BA implements StateFormatterInterface
{
    /**
     * @param $document
     * @return mixed
     */
    public function format($document)
    {
        if (strlen($document) <= 8) {
            $mask = '######-##';
        } else {
            $mask = '#######-##';
        }

        return StringHelper::applyMask($mask, $document);
    }
}
