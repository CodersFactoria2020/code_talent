<?php

namespace App;

use Goutte\Client;

class WebScrapping
{
    public function scrap(string $url)
    {
        $client = new Client();
        $crawler = $client->request('GET', $url);

        return $crawler;
    }
}
