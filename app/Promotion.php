<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = ['name','course_id'];

    protected function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    protected function courses()
    {
        return $this->hasMany(Course::class);
    }

}

