<?php

namespace Tests\Feature;

use App\Candidate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\SoloLearnScraping;

class SoloLearnScrapingTest extends TestCase
{
    public function test_returns_is_array()
    {
        $mockedCourses = include 'tests/Unit/Mock_CoursesSoloLearn.php';
        $candidate = factory(Candidate::class)->make(['soloLearn' => 'https://www.sololearn.com/Profile/6700255']);
        $scrapy = new SoloLearnScraping();
        $this->scrappedCourses = $scrapy->getAllCourses($candidate);
        $this->assertIsArray($this->scrappedCourses);
        $this->assertEquals($mockedCourses, $this->scrappedCourses);
    }
}
