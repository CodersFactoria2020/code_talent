<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Candidate;

class WebScraping extends TestCase
{

    public function testExample(string $candidate->soloLearn)
    {
        $client = new Client();
        $crawler = $client->request('GET', $candidate);
        dd($crawler);

        return $crawler;
    }
}
