<?php

namespace App;

use App\WebScraping;


class SoloLearnScraping extends WebScraping
{
    public function getAllCourses($url)
    {
        $crawler = self::scrap($url);

        $all_courses = [];

        $courses = $crawler->filter('.courseWrapper')
        ->each (function($courseNode) use (&$all_courses){
            $courseTitle = $courseNode->filter('a[class="course"]')->attr('title');
            $coursePercentage = $courseNode->filter('div[class="chart"]')->attr('data-percent');
            $coursePoints = $courseNode->filter('p')->text();
            array_push($all_courses, [$courseTitle, $coursePercentage, $coursePoints]);
        });

        return $all_courses;
    } 

    public function get_PHP_course($all_courses)
    {
        foreach ($all_courses as $course){

            if (in_array ('PHP Tutorial',$course )){
                return $course;
            }           
        }
        
        return False;    
    }

    public function get_json_data ($get_PHP_course)
    {   
        
        $json_course = fopen('PHP_course.json', 'w');
        fwrite($json_course, json_encode($get_PHP_course));
        fclose($json_course);
        
        return $json_course;
    }
    
}