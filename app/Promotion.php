<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = ['name'];

    public function candidate()
    {
        return $this->hasMany(Candidate::class);
    }

}

