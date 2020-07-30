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

    public function get_html_and_css_courses($completedCourses)
    {
        $html_or_css = [];
        foreach($completedCourses as $course)
        {
            if($course == 'Learn HTML' || $course == 'Learn CSS')
            {
                array_push($html_or_css, $course);
            }
        }

        return $html_or_css;
    }

    public function get_json_data ($html_and_css_courses )
    {
        $json_course = fopen('HTML_CSS_course.json', 'w');
        fwrite($json_course, json_encode($html_and_css_courses));
        fclose($json_course);
        
        return $json_course;
    }

}
