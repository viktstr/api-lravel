<?php

namespace App\Common\Parser;

/**
 * Class JsonParser
 * @package App\Common\Parser
 */
class JsonParser implements ParserInterface
{
    /**
     * @param $data
     * @return mixed
     */
    public function parse($data)
    {
        return  json_decode($data, true);
    }

    /**
     * @param $data
     * @return bool
     */
    public static function isValid($data) {
        json_decode($data);

        return json_last_error() === JSON_ERROR_NONE;
    }
}