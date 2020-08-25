<?php

namespace Tests\Unit;

use App\Candidate;
use App\Course;
use Tests\TestCase;

use App\SoloLearnScraping;

class SoloLearnScrapingTest extends TestCase
{
    private $scrappedCourses;
    private $scrapy;
    public function setUp() :void
    {
        parent::setUp();
        $this->scrapy = $this->partialMock(SoloLearnScraping::class, function ($mock) {
            $allCourses = include 'tests/Unit/Mock_CoursesSoloLearn.php';
            $mock->shouldReceive('getAllCourses')->andReturns($allCourses);
        });

        $this->scrappedCourses = $this->scrapy->getAllCourses('');
    }

    public function test_get_specific_course()
    {
        $this->assertContains('PHP Tutorial', $this->scrappedCourses[4]);
    }

    public function test_get_about_course( )
    {
        $targetCourse = new Course();
        $targetCourse->setName('PHP Tutorial');

        $php_course = $this->scrapy->getCourse($this->scrappedCourses,$targetCourse);

        $this->assertContains('PHP Tutorial',$php_course);
        $this->assertContains('100',$php_course);
        $this->assertContains('260 XP',$php_course);
    }


    public function test_get_json_data()
    {
        $php_course = $this->scrapy->getCourse($this->scrappedCourses);

        $this->scrapy->get_json_data($php_course);
        $json = file_get_contents('PHP_course.json');
        $json_data = json_decode($json, true);


        $this->assertEquals($php_course, $json_data);
    }

}
