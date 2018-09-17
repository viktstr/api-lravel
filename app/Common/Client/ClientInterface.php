<?php

namespace App\Common\Client;

interface ClientInterface
{
    public function send($url, $method, $params = []);
}