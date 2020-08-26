<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    private $percentage;
    private $last_connection;

    public static function fromSoloLearn(SoloLearnScraping $scraping, Course $targetCourse)
    {
        $scrapped = $scraping->getCourse($targetCourse);
        $get_position_percentage = $scrapped[1];

        $progress = new Progress();
        $progress->setPercentage($get_position_percentage);

        return $progress;
    }

    public static function fromCodeAcademy(CodeAcademyScraping $scrappy_codeAcademy, Course $html_course)
    {
        $progress = new Progress();


        $scrapped = $scrappy_codeAcademy->getCourse($html_course);
            if ($scrapped === 'No existe el curso seleccionado')
            {
                $progress->setPercentage(0);
                return $progress;
            }
            $progress->setPercentage(100);

        return $progress;
    }


    public function getPercentage()
    {
        return $this->percentage;
    }

    public function setPercentage($percentage)
    {
        $this->percentage = intval($percentage);
    }

    public function getLastConnection()
    {
        return $this->last_connection;
    }

    public function setLastConnection($last_connection)
    {
        $this->last_connection = $last_connection;
    }







}
