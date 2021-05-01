<?php

namespace JC\BrDocs\Formatters\IeFormatter\States;

use JC\BrDocs\Helpers\StringHelper;

/**
 * Class RN
 * @package JC\BrDocs\Formatters\IeFormatter\States
 */
class RN implements StateFormatterInterface
{
    /**
     * @param $document
     * @return mixed
     */
    public function format($document)
    {
        if (strlen($document) <= 9) {
            $mask = '##.###.###-#';
        } else {
            $mask = '##.#.###.###-#';
        }

        return StringHelper::applyMask($mask, $document);
    }
}
