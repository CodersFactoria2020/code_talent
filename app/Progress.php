<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    private $data;

    public function getData()
    {
        return $this->data;
    }

    public function setData(string $data)
    {
        $this->data = $data;
    }

}
