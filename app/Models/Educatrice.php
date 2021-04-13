<?php

namespace App\Models;

use App\Models\Enfant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Educatrice extends Authenticatable
{
    use HasFactory, Notifiable;

    /*     protected $casts = [
        'date_naissance' => 'datetime:Y-m-d',
        'date_embauche' => 'datetime:Y-m-d',
    ]; */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname',
        'password',
        'sexe',
        'date_naissance',
        'date_embauche',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    //Une educatrice peut avoir plusieurs enfants assignés
    public function enfants()
    {
        return $this->hasMany(Enfant::class);
    }

    //Une educatrice peut avoir plusieurs activites assignés
    public function activites()
    {
        return $this->hasMany(Activites::class);
    }

    //Une educatrice peut avoir plusieurs formations
    public function formations()
    {
        return $this->hasMany(EducatriceFormations::class);
    }

    //Une educatrice peut avoir plusieurs specifications 
    public function specialisations()
    {
        return $this->hasMany(EducatriceSpecialisations::class);
    }
}
