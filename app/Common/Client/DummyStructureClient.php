<?php

namespace App\Common\Client;

/**
 * Class DummyStructureClient
 * @package App\Common\Client
 */
class DummyStructureClient implements ClientInterface
{
    /**
     * @param $url
     * @param $method
     * @param array $params
     * @return string
     */
    public function send($url, $method, $params = [])
    {
        return $this->getJsonResponse();
    }

    /**
     * @return string
     */
    protected function getJsonResponse()
    {
        $json =
            '{
                "name": "%d",
                "items": [
                    {
                        "location": "right",
                        "resource": "http://test",
                        "typeView": "graph",
                        "typeGraph": "linear",
                        "period": [
                            "1h",
                            "3h"
                        ]
                    }
                ]
            }';

        $name = mt_rand(3001, 4001);

        return sprintf($json, $name);
    }
}