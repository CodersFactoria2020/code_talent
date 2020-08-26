<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    private $percentage;

    public function getPercentage()
    {
        return $this->percentage;
    }

    public function setPercentage($percentage)
    {
        $this->percentage = intval($percentage);
    }

}
