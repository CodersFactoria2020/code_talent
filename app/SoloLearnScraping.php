<?php

namespace App;

use App\WebScraping;
use Goutte\Client;


class SoloLearnScraping implements WebScraping
{
   public function getAllCourses($candidate)
    {
        $client = new Client();
        $crawler = $client->request('GET', $candidate->soloLearn);

        $all_courses = [];

        $crawler->filter('.courseWrapper')
        ->each (function($courseNode) use (&$all_courses) {
            $courseTitle = $courseNode->filter('a[class="course"]')->attr('title');
            $coursePercentage = $courseNode->filter('div[class="chart"]')->attr('data-percent');
            $coursePoints = $courseNode->filter('p')->text();
            array_push($all_courses, [$courseTitle, $coursePercentage, $coursePoints]);
        });

        return $all_courses;

    }

     public function getCourse($allCourses, $targetCourse)
        {
            foreach ($allCourses as $course){
                if (in_array ($targetCourse->getName(),$course )){

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
