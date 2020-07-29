<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = ['name', 'lastname', 'email', 'status', 'soloLearn', 'codeAcademy'];

    public function promotion()
    {
        return $this->hasMany(Promotion::class);
    }

}
