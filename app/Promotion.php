<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = ['name', 'promotion'];

    public function candidate ()
    {
        return $this->belongsTo(Candidate::class);
    }

}

