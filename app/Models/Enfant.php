<?php

namespace App\Models;

use App\Models\Tuteur;
use App\Models\Vaccin;
use App\Models\Allergie;
use App\Models\Cmedicale;
use App\Models\Incidence;
use App\Models\Educatrice;
use App\Models\Comportement;
use App\Models\Recuperateur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enfant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'sexe',
        'programme',
        'date_naissance',
        'educatrice_id',
    ];

    //L'enfent peut avoir plusieurs vaccins (relation many to many)
    public function vaccin()
    {
        return $this->belongsToMany(Vaccin::class, 'vaccins_enfants');
    }

    //L'enfent peut avoir plusieurs allergies (relation many to many)
    public function allergie()
    {
        return $this->belongsToMany(Allergie::class, 'allergies_enfants');
    }

    //L'enfent peut avoir plusieurs problemes comportemenataux (relation many to many)
    public function comportement()
    {
        return $this->belongsToMany(Comportement::class, 'comportements_enfants');
    }

    //L'enfent peut avoir plusieurs problemes comportemenataux (relation many to many)
    public function contrainteMedicale()
    {
        return $this->belongsToMany(Cmedicale::class, 'cmedicales_enfants');
    }

    //L'enfent peut avoir plusieurs vaccins (relation many to many)
    public function activites()
    {
        return $this->belongsToMany(Activites::class, 'activites_enfants');
    }

    //L'enfant peut avoir plusieurs paiements (relation many to many)
    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }


    //L'enfant est assigné à une educatrice (relation one to many(inverse) )
    public function educatrice()
    {
        return $this->belongsTo(Educatrice::class);
    }

    //L'enfant a plus d'un tuteur (relation one to many)
    public function tuteurs()
    {
        return $this->hasMany(Tuteur::class);
    }

    //L'enfant peut avoir plus d'un Recuperateur (relation one to many)
    public function recuperateurs()
    {
        return $this->hasMany(Recuperateur::class);
    }

    //L'enfant peut avoir plus d'un Recuperateur (relation one to many)
    public function incidents()
    {
        return $this->hasMany(Incidence::class);
    }
}
