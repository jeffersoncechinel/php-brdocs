<?php

namespace JC\BrDocs\Formatters\IeFormatter\States;

use JC\BrDocs\Helpers\StringHelper;

/**
 * Class PE
 * @package JC\BrDocs\Formatters\IeFormatter\States
 */
class PE implements StateFormatterInterface
{
    /**
     * @param $document
     * @return mixed
     */
    public function format($document)
    {
        if (strlen($document) <= 9) {
            $mask = '#######-##';
        } else {
            // old format
            $mask = '##.#.###.#######-#';
        }
        return StringHelper::applyMask($mask, $document);
    }
}
