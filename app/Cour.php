<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Nicolaslopezj\Searchable\SearchableTrait;
class Cour extends Model
{
    use Notifiable;
    use SearchableTrait;

       /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'cours.titre' => 10,
            'cours.id' => 10,
        ]
    ];

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titre', 'lien', 'module_id',
    ];
    public function tds(){
        return $this->hasMany('App\Td');
    }
    public function tps(){
        return $this->hasMany('App\Tp');
    }
    public function module(){
        
        return $this->belongsTo('App\Module');
    }
    public function shouldBeSearchable()
{
    return $this->isPublished();
}
  
    
}
