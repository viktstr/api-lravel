<?php

namespace App\Common\Client;

class DummyDataClient implements ClientInterface
{
    public function send($url, $method, $params = [])
    {
        return rand(1, 100);
    }
}