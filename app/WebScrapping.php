<?php

namespace App;

use Goutte\App;

class WebScrapping
{
    protected function scrap()
    {
        $client = new Client();
        return $client;
    }
}
