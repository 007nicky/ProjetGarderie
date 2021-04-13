<?php

namespace App\Http\Controllers\Activites;

use App\Models\Enfant;
use App\Models\Activites;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Educatrice;

class AjouterActiviteController extends Controller
{
    //fonction d'affichage de registration page
    public function index()
    {

        //Extraire la liste des activite de la base de données
        $allActivites = Activites::get();

        //Extraire la liste des educatrices de la base de données
        $allEducatrices = Educatrice::get();

        //Retourner la liste a la vue correspondante
        return view('activites.ajoutActivite', [
            'activites' => $allActivites,
            'educatrices' => $allEducatrices,
        ]);
    }

    //Apres l'entrée des identifiants, enregistrer enfant dans la base de donnee
    public function check(Request $request, Enfant $enfant, Activites $activite, Educatrice $educatrice)
    {

        //Valider les champs
        $this->validate($request, [
            'name' => 'required|max:255',
            'activites' => 'required|not_in:0',
            'descriptionactivite' => 'required|max:1000',
            'places' => 'required|numeric',
            'prix' => 'required|numeric|between:0,99.99',

            'date_debut' => 'required|date_format:Y-m-d',
            'date_fin' => 'required|date_format:Y-m-d',

            'heure_debut' => 'required|date_format:H:i',
            'heure_fin' => 'required|date_format:H:i',

            'educatrices' => 'required',

        ]);

        //Creer enfant dans la base de donnees
        Activites::create(
            [
                'nom' => $request->name,
                'type' => $request->activites,
                'description' => $request->descriptionactivite,
                'places' => $request->places,
                'prix' => $request->prix,
                'date_debut' => $request->date_debut,
                'date_fin' => $request->date_fin,
                'heure_debut' => $request->heure_debut,
                'heure_fin' => $request->heure_fin,
                'contraintes' => $request->descriptioncontrainte,
                'educatrice_id' => $request->educatrices,

            ]
        )->id;

        //Apres enregistrement, rediriger vers la liste des enfants
        return redirect()->route('listeactivites')->with('success', 'Activite bien ajouté');
    }
}
