<?php

namespace App\Http\Controllers\Activites;

use App\Http\Controllers\Controller;
use App\Models\Activites;
use Illuminate\Http\Request;

class ListeActivitesController extends Controller
{

    public function index()
    {
        //Extraire la liste des educatrices de la base de données
        $allActivites = Activites::get();

        //Retourner la liste a la vue correspondante
        return view('activites.listeActivites', [
            'activites' => $allActivites,
        ]);
    }
}
