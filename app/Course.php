<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    private $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
}
