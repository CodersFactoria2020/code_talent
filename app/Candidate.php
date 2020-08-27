<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = ['name', 'lastname', 'email', 'promotion_id', 'phone_number', 'status', 'soloLearn', 'codeAcademy'];

    protected function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
}
