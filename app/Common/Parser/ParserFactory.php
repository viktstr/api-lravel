<?php

namespace App\Common\Parser;

/**
 * Class ParserFactory
 * @package App\Common\Parser
 */
class ParserFactory
{
    /**
     * @param $response
     * @return ParserInterface
     * @throws \HttpResponseException
     */
    public static function create($response)
    {
        if (HtmlParser::isValid($response)){
            $parser = new HtmlParser();
        } elseif (JsonParser::isValid($response)){
            $parser = new JsonParser();
        } else {
            throw new \HttpResponseException('Получены не валидные данные');
        }

        return $parser;
    }
}