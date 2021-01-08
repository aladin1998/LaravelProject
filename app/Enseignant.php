<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    public function departements()
    {
        return $this->belongsToMany('App\Departement');
    }
    public function modules()
    {
        return $this->belongsToMany('App\Module')->withPivot('annee');
    }


}
