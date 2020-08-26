<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    private $percentage;

    public static function fromSoloLearn(SoloLearnScraping $scraping, $targetCourse)
    {
        $scrapped = $scraping->getCourse($targetCourse);
        $get_position_percentage = $scrapped[1];

        $progress = new Progress();
        $progress->setPercentage($get_position_percentage);


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
