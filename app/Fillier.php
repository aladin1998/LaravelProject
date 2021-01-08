<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fillier extends Model
{
    public function modules(){

        return $this->hasMany('App\Module');
    }
    public function departements(){
        return $this->hasMany('App\Departement');
    }
    public function users(){
        return $this->hasMany('App\User');
    }
}
