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

    public function test_returns_completed_courses()
    {
        $numberOfCompletedCourses = 4;

        $this->assertEquals($numberOfCompletedCourses, count($this->completedCourses));
        $this->assertContains('Learn HTML', $this->completedCourses);
    }


    public function test_returns_last_connection()
    {

        $lastConnection = $this->scraper->lastConnection($this->url);

        $this->assertTrue(str_contains($lastConnection, 'Last coded'));
    }

    public function test_get_about_courses()
    {

        $html_and_css_courses = $this->scraper->get_html_and_css_courses($this->completedCourses);

        $this->assertContains('Learn HTML', $html_and_css_courses);
        $this->assertContains('Learn CSS', $html_and_css_courses);
        $this->assertEquals(2, count($html_and_css_courses));

    }

    public function test_get_json_data()
    {

        $html_and_css_courses = $this->scraper->get_html_and_css_courses($this->completedCourses);
        $this->scraper->get_json_data($html_and_css_courses);

        $json = file_get_contents('HTML_CSS_course.json');
        $json_data = json_decode($json, true);


        $this->assertEquals($html_and_css_courses, $json_data);

    }
}
