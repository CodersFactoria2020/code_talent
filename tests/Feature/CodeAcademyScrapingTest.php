<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\CodeAcademyScraping;

class CodeAcademyScrapingTest extends TestCase
{

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

        $this->assertTrue(str_contains($lastConnection, 'Last coded'));
    }

    public function test_get_about_courses()
    {
        $url = "https://www.codecademy.com/profiles/sergioliveresamor_fullstackphysio";
        $scraper = new CodeAcademyScraping();

        $completedCourses = $scraper->getCompletedCourses($url);
        $html_and_css_courses = $scraper->get_html_and_css_courses($completedCourses);

        $this->assertContains('Learn HTML', $html_and_css_courses);
        $this->assertContains('Learn CSS', $html_and_css_courses);
        $this->assertEquals(2, count($html_and_css_courses));

    }

    public function test_get_json_data()
    {
        $url = "https://www.codecademy.com/profiles/sergioliveresamor_fullstackphysio";
        $scraper = new CodeAcademyScraping();

        $completedCourses = $scraper->getCompletedCourses($url);
        $html_and_css_courses = $scraper->get_html_and_css_courses($completedCourses);
        $scraper->get_json_data($html_and_css_courses);

        $json = file_get_contents('HTML_CSS_course.json');
        $json_data = json_decode($json, true);


        $this->assertEquals($html_and_css_courses, $json_data);

    }
}
