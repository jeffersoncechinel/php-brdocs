<?php

namespace JC\BrDocs\Formatters\IeFormatter\States;

use JC\BrDocs\Helpers\StringHelper;

/**
 * Class RJ
 * @package JC\BrDocs\Formatters\IeFormatter\States
 */
class RJ implements StateFormatterInterface
{
    /**
     * @param $document
     * @return mixed
     */
    public function format($document)
    {
        return StringHelper::applyMask('##.###.##-#', $document);
    }
}
