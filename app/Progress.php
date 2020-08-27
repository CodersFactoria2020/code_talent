<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    protected $table = 'Topografia';

    public static function fromSoloLearn(SoloLearnScraping $scraping, Course $targetCourse)
    {
        $scrapped = $scraping->getCourse($targetCourse);
        $get_position_percentage = $scrapped[1];

        $progress = new Progress();
        $progress->setPercentage($get_position_percentage);
        $progress->save();
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
}
