<?php

namespace App\Common\Parser;

class HtmlParser implements ParserInterface
{
    public function parse($data)
    {
        $document = new \DOMDocument();

        $document->loadHTML($data);
    }

    /**
     * @param $data
     * @return bool
     */
    public static function isValid($data){
        return strip_tags($data) != $data;
    }
}