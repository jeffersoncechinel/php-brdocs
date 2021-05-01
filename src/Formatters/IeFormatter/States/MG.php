<?php

namespace JC\BrDocs\Formatters\IeFormatter\States;

use JC\BrDocs\Helpers\StringHelper;

/**
 * Class MG
 * @package JC\BrDocs\Formatters\IeFormatter\States
 */
class MG implements StateFormatterInterface
{
    /**
     * @param $document
     * @return mixed
     */
    public function format($document)
    {
        return StringHelper::applyMask('###.###.###/####', $document);
    }
}
