<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Td extends Model
{
    public function cour(){

        return $this->belongsTo('App\Cour');
    }
}
