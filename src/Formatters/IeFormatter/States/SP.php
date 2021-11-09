<?php

namespace JC\BrDocs\Formatters\IeFormatter\States;

use JC\BrDocs\Helpers\StringHelper;

/**
 * Class SP
 * @package JC\BrDocs\Formatters\IeFormatter\States
 */
class SP implements StateFormatterInterface
{
    /**
     * @param $document
     * @return mixed
     */
    public function format($document)
    {
        if (strlen($document) <= 12) {
            $mask = '###.###.###.###';
        } else {
            $mask = '#-########.#/###';
        }

        return StringHelper::applyMask($mask, $document);
    }
}
