<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Nicolaslopezj\Searchable\SearchableTrait;

class Module extends Model
{    use Notifiable;
    use SearchableTrait;

       /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'modules.libelle' => 10,
            'modules.id' => 10,
        ]
    ];

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'libelle', 'fillier_id',
    ];
    public function cours()
    {
        return $this->hasMany('App\Cour');
    }
    public function fillier(){
        return $this->belongsTo('App\Fillier');
    }
    public function enseignants()
    {
        return $this->belongsToMany('App\Enseignant')->wherePivot('annee',date("Y"));
    }

}
