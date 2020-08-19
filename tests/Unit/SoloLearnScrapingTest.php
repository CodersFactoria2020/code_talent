<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\SoloLearnScraping;

class SoloLearnScrapingTest extends TestCase
{   
    private $scrappedCourses;

    public function test_get_specific_course()
    {   
        $scrapy = $this->partialMock(SoloLearnScraping::class, function ($mock) {
            $allCourses = include 'tests\Unit\AllCoursesMock.php';
            $mock->shouldReceive('getAllCourses')->andReturns($allCourses);
        });

        $this->scrappedCourses = $scrapy->getAllCourses('');
        $this->assertContains('PHP Tutorial', $this->scrappedCourses[4]);
    }
    /*
    public function test_get_about_course( )
    {
        $scrapy = new SoloLearnScraping();
        $php_course = $scrapy->get_PHP_course($this->scrappedCourses);

        $this->assertContains('PHP Tutorial',$php_course);
        $this->assertContains('100',$php_course);
        $this->assertContains('260 XP',$php_course);
    }


    public function test_get_json_data()
    {
        $scrapy = new SoloLearnScraping();
        $php_course = $scrapy->get_PHP_course($this->scrappedCourses);

        $scrapy->get_json_data($php_course);
        $json = file_get_contents('PHP_course.json');
        $json_data = json_decode($json, true);


        $this->assertEquals($php_course, $json_data);
    }
    */
}
