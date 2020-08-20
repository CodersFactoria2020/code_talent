<?php

namespace App;

use Goutte\Client;

class WebScraping
{
    public function scrap(string $url)
    {
        $client = new Client();
        $crawler = $client->request('GET', $url);

        return $crawler;
    }
}
