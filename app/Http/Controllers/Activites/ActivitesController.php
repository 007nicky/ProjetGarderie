<?php

namespace App\Http\Controllers\Activites;

use App\Http\Controllers\Controller;
use App\Models\Activites;
use Illuminate\Http\Request;

class ActivitesController extends Controller
{
    //fonction d'affichage de la page educatrice
    public function index(Activites $activites)
    {
        return view('activites.activites', ['activite' => $activites]);
    }
}
