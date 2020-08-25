<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\CodeAcademyScraping;

class CodeAcademyScrapingTest extends TestCase
{
    private $completedCourses;
    private $scrapy;

    public function setUp(): void
    {
        parent::setUp();
        $this->scrapy = $this->partialMock(CodeAcademyScraping::class, function ($mock) {
            $allCourses = include 'tests/Unit/Mock_CoursesCodeAcademy.php';
            $mock->shouldReceive('getCompletedCourses')->andReturns($allCourses);
        });

        $this->completedCourses= $this->scrapy->getCompletedCourses('');

    }


    public function test_returns_completed_courses()
    {
        $numberOfCompletedCourses = 4;

        $this->assertEquals($numberOfCompletedCourses, count($this->completedCourses));
        $this->assertContains('Learn HTML', $this->completedCourses);
    }


    public function test_get_about_courses()
    {

        $html_and_css_courses = $this->scrapy->get_html_and_css_courses($this->completedCourses);

        $this->assertContains('Learn HTML', $html_and_css_courses);
        $this->assertContains('Learn CSS', $html_and_css_courses);
        $this->assertEquals(2, count($html_and_css_courses));

    }

    public function test_get_json_data()
    {

        $html_and_css_courses = $this->scrapy->get_html_and_css_courses($this->completedCourses);
        $this->scrapy->get_json_data($html_and_css_courses);

        $json = file_get_contents('HTML_CSS_course.json');
        $json_data = json_decode($json, true);


        $this->assertEquals($html_and_css_courses, $json_data);

    }
}
