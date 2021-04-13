<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activites extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'type',
        'description',
        'places',
        'prix',

        'date_debut',
        'date_fin',
        'heure_debut',
        'heure_fin',
        'contraintes',

        'educatrice_id',
    ];

    //L'enfant est assigné à une educatrice (relation one to many(inverse) )
    public function educatrice()
    {
        return $this->belongsTo(Educatrice::class);
    }

    //L'enfent peut avoir plusieurs vaccins (relation many to many)
    public function enfant()
    {
        return $this->belongsToMany(Enfant::class, 'activites_enfants');
    }

    //L'activite peut avoir plusieurs paiements (relation many to many)
    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }
}
