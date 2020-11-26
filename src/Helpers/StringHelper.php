<?php

namespace JC\BrDocs\Helpers;

/**
 * Class StringHelper
 * @package JC\BrDocs\Helpers
 */
class StringHelper
{
    /**
     * @param $mask
     * @param $value
     * @return mixed
     */
    public static function applyMask($mask, $value)
    {
        if (!$value) {
            return $value;
        }

        $value = self::numbersOnly($value);

        for ($i = 0; $i < mb_strlen($value); $i++) {
            $mask[strpos($mask, "#")] = $value[$i];
        }

        return $mask;
    }

    /**
     * @param $value
     * @return string|string[]|null
     */
    public static function numbersOnly($value)
    {
        return preg_replace("/[^0-9]/", "", $value);
    }

}