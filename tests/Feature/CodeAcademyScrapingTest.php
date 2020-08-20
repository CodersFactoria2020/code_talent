<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\CodeAcademyScraping;

class CodeAcademyScrapingTest extends TestCase
{
    private $url = "https://www.codecademy.com/profiles/sergioliveresamor_fullstackphysio";
    private $completedCourses;
    private $scraper;

    public function setUp() :void
    {
        $this->scraper = new CodeAcademyScraping();
        $this->completedCourses = $this->scraper->getCompletedCourses($this->url);
    }

    public function test_returns_an_array()
    {
        $this->assertIsArray($this->completedCourses);
    }

    public function test_returns_last_connection()
    {

        $lastConnection = $this->scraper->lastConnection($this->url);

        $this->assertTrue(str_contains($lastConnection, 'Last coded'));

    }


}
