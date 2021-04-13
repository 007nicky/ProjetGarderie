<?php

namespace App\Http\Controllers\Activites;

use App\Models\Enfant;
use App\Models\Activites;
use App\Models\Educatrice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ActivitesEnfants;

class InscrireEnfantController extends Controller
{
    //fonction d'affichage de registration page
    public function index(Enfant $enfant, Activites $activites)
    {

        //Extraire la liste des vaccins de la base de données
        $allActivites = Activites::get();

        //Extraire la liste des educatrices de la base de données
        $allEnfant = Enfant::get();


        //Retourner la liste a la vue correspondante
        return view('activites.inscrireEnfant', [
            'enfants' => $allEnfant,
            'activite' => $activites,
            'activites' => $allActivites,
        ]);
    }

    //Apres l'entrée des identifiants, enregistrer enfant dans la base de donnee
    public function check(Request $request, Enfant $enfant, Activites $activites, Educatrice $educatrice)
    {

        //Valider les champs
        $this->validate($request, [
            'enfants' => 'required',
            'paiement' => 'required|in:paye,impaye',
            'admissibilite' => 'required|in:admissible,inadmissible',
            'note' => 'required|max:1000',
        ]);

        //Creer enfant dans la base de donnees
        ActivitesEnfants::create(
            [
                'paiement' => $request->paiement,
                'admissibilite' => $request->admissibilite,
                'note' => $request->note,
                'enfant_id' => $request->enfants,
                'activites_id' => $activites->id,
            ]
        )->id;

        //Apres enregistrement, rediriger vers la liste des enfants
        return redirect()->route('listeactivites')->with('success', 'Enfant bien inscrit');
    }
}
