<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

class BeersListTest extends TestCase
{
    const URL_BASE = 'https://api.punkapi.com/v2/beers';

    public function testSomething(): void
    {
        $client = new Client([
            'base_uri' => self::URL_BASE,
            'timeout' => 300.0,
            'headers' => ['Content-Type' => 'application/json', "Accept" => "application/json"],
            'http_errors' => false,
            'verify' => false
        ]);

        $response = $client->request('GET', 'beers');

        $this->assertEquals(200, $response->getStatusCode());

        $contentType = $response->getHeaders()["Content-Type"][0];
        $this->assertEquals("application/json; charset=utf-8", $contentType);
    }
}
