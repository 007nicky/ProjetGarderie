<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivitesEnfants extends Model
{
    use HasFactory;

    protected $fillable = [
        'paiement',
        'admissibilite',
        'note',
        'enfant_id',
        'activites_id',
    ];
}
