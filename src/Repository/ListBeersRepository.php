<?php

namespace App\Repository;

use GuzzleHttp\Client;

class ListBeersRepository
{
    const URL_BASE = 'https://api.punkapi.com/v2/beers';

    public function listBeers($addUrl = null)
    {
        $client = new Client([
                'base_uri' => self::URL_BASE,
                'timeout' => 300.0,
                'headers' => ['Content-Type' => 'application/json', "Accept" => "application/json"],
                'http_errors' => false,
                'verify' => false
        ]);

        $res = $client->request('GET', 'beers' . $addUrl);

        return $res->getBody()->getContents();
    }
}