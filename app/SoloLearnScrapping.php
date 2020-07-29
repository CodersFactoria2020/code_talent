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
            $coursePercentage = $courseNode->filter('div[class="chart"]')->attr('data-percent');#string
            $coursePoints = $courseNode->filter('p')->text();
            array_push($all_courses, [$courseTitle, $coursePercentage, $coursePoints]);
        });
        return $all_courses;
    } 
}