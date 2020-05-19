<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    public function questions()
    {
        return $this->hasOne('App\Question');
    }
}
