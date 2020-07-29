<?php

namespace App;

use App\WebScraping;

class CodeAcademyScraping extends WebScraping
{
    public function getCompletedCourses($url)
    {
        $crawler = self::scrap($url);

        $completedCourses = [];
        $courses = $crawler->filter('.container__25St-wPttEa00dbsIQGsRH')->each(function ($courseNode) use (&$completedCourses)
        {   
            $courseTitle = $courseNode->filter('.title__YKjOCEmg015vuLRonUC5l')->text();
            
            array_push($completedCourses, $courseTitle);
        }); 
    
        return $completedCourses;
    }

    public function lastConnection($url)
    {   
        $crawler = self::scrap($url);
        $lastCoded = $crawler->filter('.label__2YO_cDf1Lu9PDDsn62kz6L > span')->text();
      
        return $lastCoded;
    }
}
