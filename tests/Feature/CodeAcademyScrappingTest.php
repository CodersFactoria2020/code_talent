<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\CodeAcademyScraping;

class CodeAcademyScrapingTest extends TestCase
{
    /*
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    */
    public function test_returns_an_array()
    {   
        $url = "https://www.codecademy.com/profiles/sergioliveresamor_fullstackphysio";
        
        $scraper = new CodeAcademyScraping();
        $completedCourses = $scraper->getCompletedCourses($url);
        
        $this->assertIsArray($completedCourses);
    }

    public function test_returns_completed_courses()
    {
        $url = "https://www.codecademy.com/profiles/sergioliveresamor_fullstackphysio";
        $numberOfCompletedCourses = 4;
        
        $scraper = new CodeAcademyScraping();
        $completedCourses = $scraper->getCompletedCourses($url);
        
        $this->assertEquals($numberOfCompletedCourses, count($completedCourses));
        $this->assertContains('Learn HTML', $completedCourses);
    }

    
    public function test_returns_last_connection()
    {
        $url = "https://www.codecademy.com/profiles/sergioliveresamor_fullstackphysio";
        $scraper = new CodeAcademyScraping();
        $lastConnection = $scraper->lastConnection($url);
        dd($lastConnection);
        $this->assertTrue(str_contains($lastConnection, 'Last coded'));
    }
    
}
