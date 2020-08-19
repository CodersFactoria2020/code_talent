<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\SoloLearnScraping;

class SoloLearnScrapingTest extends TestCase
{
    private  $url = "https://www.sololearn.com/Profile/6700255";
    private $scrappedCourses;
    
    public function setUp() :void
    {
        $scrapy = new SoloLearnScraping();
        $this->scrappedCourses = $scrapy->getAllCourses($this->url);
    }
    
    public function test_returns_is_array()
    {
       $this->assertIsArray($this->scrappedCourses);
    }
}
