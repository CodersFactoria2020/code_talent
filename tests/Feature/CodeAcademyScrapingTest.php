<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\CodeAcademyScraping;

class CodeAcademyScrapingTest extends TestCase
{
    private $url = "https://www.codecademy.com/profiles/sergioliveresamor_fullstackphysio";
    
    /*
    public function setUp() :void
    {
        
    }
    */
    public function test_returns_an_array()
    {
        $scraper = new CodeAcademyScraping();
        $completedCourses = $scraper->getCompletedCourses($this->url);

        $this->assertIsArray($completedCourses);
    }

    public function test_returns_completed_courses()
    {
        $numberOfCompletedCourses = 4;

        $scraper = new CodeAcademyScraping();
        $completedCourses = $scraper->getCompletedCourses($this->url);

        $this->assertEquals($numberOfCompletedCourses, count($completedCourses));
        $this->assertContains('Learn HTML', $completedCourses);
    }


    public function test_returns_last_connection()
    {
        $scraper = new CodeAcademyScraping();
        $lastConnection = $scraper->lastConnection($this->url);

        $this->assertTrue(str_contains($lastConnection, 'Last coded'));
    }

    public function test_get_about_courses()
    {
        $scraper = new CodeAcademyScraping();

        $completedCourses = $scraper->getCompletedCourses($this->url);
        $html_and_css_courses = $scraper->get_html_and_css_courses($completedCourses);

        $this->assertContains('Learn HTML', $html_and_css_courses);
        $this->assertContains('Learn CSS', $html_and_css_courses);
        $this->assertEquals(2, count($html_and_css_courses));

    }

    public function test_get_json_data()
    {
        $scraper = new CodeAcademyScraping();

        $completedCourses = $scraper->getCompletedCourses($this->url);
        $html_and_css_courses = $scraper->get_html_and_css_courses($completedCourses);
        $scraper->get_json_data($html_and_css_courses);

        $json = file_get_contents('HTML_CSS_course.json');
        $json_data = json_decode($json, true);


        $this->assertEquals($html_and_css_courses, $json_data);

    }
}
