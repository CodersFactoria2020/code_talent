<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    private $percentage;
    //private $last_connection;

    public function getPercentage()
    {
        return $this->percentage;
    }

    public function setPercentage($percentage)
    {
        $this->percentage = intval($percentage);
    }

    /*public function getLastConnection()
    {
        return $this->last_connection;
    }

    public function setLastConnection()
    {
        $this->last_connection = $last_connection;
    }*/

}
