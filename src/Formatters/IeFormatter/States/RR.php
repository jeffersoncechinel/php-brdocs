<?php

namespace JC\BrDocs\Formatters\IeFormatter\States;

use JC\BrDocs\Helpers\StringHelper;

/**
 * Class RR
 * @package JC\BrDocs\Formatters\IeFormatter\States
 */
class RR implements StateFormatterInterface
{
    /**
     * @param $document
     * @return mixed
     */
    public function format($document)
    {
        return StringHelper::applyMask('########-#', $document);
    }
}
