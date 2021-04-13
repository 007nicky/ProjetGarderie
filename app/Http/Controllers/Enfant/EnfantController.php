<?php

namespace App\Http\Controllers\Enfant;

use App\Models\Enfant;
use App\Models\Activites;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EnfantController extends Controller
{

    //fonction d'affichage de la page enfant
    public function index(Enfant $enfant)
    {

        //$vaccin = $enfant->vaccin()
        //dd($enfant);
        //Extraire la liste des educatrices de la base de données
        $allActivites = Activites::get();

        return view('enfant.enfant', ['enfant' => $enfant, 'activites' => $allActivites]);
    }
}
