<?php

namespace App;

use App\WebScraping;
use Goutte\Client;

class CodeAcademyScraping implements WebScraping
{
    public function getAllCourses($candidate)
    {
        $client = new Client();
        $crawler = $client->request('GET', $candidate->codeacademy);

        $all_courses = [];

        $crawler->filter('.container__25St-wPttEa00dbsIQGsRH')
        ->each(function ($courseNode) use (&$all_courses)
        {
            $courseTitle = $courseNode->filter('.title__YKjOCEmg015vuLRonUC5l')->text();

            array_push($all_courses, $courseTitle);
        });

        return $all_courses;
    }
    public function getCourse($all_courses, Course $course)
    {
        // TODO: Implement getCourse() method.
    }

    public function lastConnection($candidate)
    {
        $client = new Client();
        $crawler = $client->request('GET', $candidate->codeacademy);

        $lastCoded = $crawler->filter('.label__2YO_cDf1Lu9PDDsn62kz6L > span')->text();

        return $lastCoded;
    }

    public function get_html_and_css_courses($all_courses)
    {
        $html_or_css = [];
        foreach($all_courses as $course)
        {
            if($course == 'Learn HTML' || $course == 'Learn CSS')
            {
                array_push($html_or_css, $course);
            }
        }

        return $html_or_css;
    }

    public function get_json_data ($html_and_css_courses)
    {
        $json_course = fopen('HTML_CSS_course.json', 'w');
        fwrite($json_course, json_encode($html_and_css_courses));
        fclose($json_course);

        return $json_course;
    }


}
