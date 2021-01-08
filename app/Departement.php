<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\MorphPivot ;

class Departement extends Model
{
    public function fillier(){

        return $this->belongsTo('App\Fillier');
    }
    public function enseignants()
    {
        return $this->belongsToMany('App\Enseignant');
    }
    
}
