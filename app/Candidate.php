<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = ['name', 'lastname', 'email', 'phone_number', 'status', 'soloLearn', 'codeAcademy'];

}
