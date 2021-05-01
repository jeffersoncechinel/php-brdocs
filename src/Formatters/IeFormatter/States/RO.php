<?php

namespace JC\BrDocs\Formatters\IeFormatter\States;

use JC\BrDocs\Helpers\StringHelper;

/**
 * Class RO
 * @package JC\BrDocs\Formatters\IeFormatter\States
 */
class RO implements StateFormatterInterface
{
    /**
     * @param $document
     * @return mixed
     */
    public function format($document)
    {
        if (strlen($document) <= 9) {
            $mask = '###.#####-#';
        } else {
            $mask = '#############-#';
        }

        return StringHelper::applyMask($mask, $document);
    }
}
