<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = ['name', 'lastname', 'email', 'promotion_id', 'phone_number', 'sololearn_progress','codeacademy_progress','soloLearn', 'codeAcademy'];

    protected function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
}
