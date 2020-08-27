<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    private $name;

    public function __construct(string $name)
    {
        $this->setName($name);
    }

    public function getName()
    {
        return $this->name;
    }

    private function setName(string $name)
    {
        $this->name = $name;
    }
}
