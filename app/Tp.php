<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tp extends Model
{
    public function cours(){

        return $this->belongsTo('App\Cour');
    }
}
