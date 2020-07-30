<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\SoloLearnScraping;

class SoloLearnScrapingTest extends TestCase
{
    public function test_returns_is_array()
    {   
        $url = "https://www.sololearn.com/Profile/6700255";
        
        $scrapy = new SoloLearnScraping();
        $all_courses = $scrapy->getAllCourses($url);

        $this->assertIsArray($all_courses);
    }

    public function test_get_specific_course()
    {
        $url = "https://www.sololearn.com/Profile/6700255";

        $scrapy = new SoloLearnScraping();

        $course = $scrapy->getAllCourses($url);

        $this->assertContains('PHP Tutorial', $course[4]);
    }

    public function test_get_about_course( )
    {
        $url = "https://www.sololearn.com/Profile/6700255";

        $scrapy = new SoloLearnScraping();

        $course = $scrapy->getAllCourses($url);
       
        $php_course = $scrapy->get_PHP_course($course);
        

        $this->assertContains('PHP Tutorial',$php_course);
        $this->assertContains('100',$php_course);
        $this->assertContains('260 XP',$php_course);
        
    }


    public function test_get_json_data()
    {
        $url = "https://www.sololearn.com/Profile/6700255";
        
        $scrapy = new SoloLearnScraping();
        $all_courses = $scrapy->getAllCourses($url);
        $php_course = $scrapy->get_PHP_course($all_courses);
       
        $json = file_get_contents('PHP_course.json');
        $json_data = json_decode($json, true);

        $this->assertEquals($php_course, $json_data);

    }
    
}
