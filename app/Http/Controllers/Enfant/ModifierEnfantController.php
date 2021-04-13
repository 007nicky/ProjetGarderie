<?php

namespace App\Http\Controllers\Enfant;

use App\Models\Enfant;
use App\Models\Vaccin;
use App\Models\Allergie;
use App\Models\Cmedicale;
use App\Models\Educatrice;
use App\Models\Comportement;
use Illuminate\Http\Request;
use App\Models\VaccinsEnfants;
use App\Models\AllergiesEnfants;
use App\Models\CmedicalesEnfants;
use App\Http\Controllers\Controller;
use App\Models\ComportementsEnfants;

class ModifierEnfantController extends Controller
{
    //fonction d'affichage de registration page
    public function index(Enfant $enfant)
    {

        //Extraire la liste des vaccins de la base de données
        $allVaccins = Vaccin::get();

        //Extraire la liste des allergies de la base de données
        $allAllergies = Allergie::get();

        //Extraire la liste des educatrices de la base de données
        $allEducatrices = Educatrice::get();


        //Retourner la liste a la vue correspondante
        return view('enfant.modifierEnfant', [
            'enfant' => $enfant,
            'vaccins' => $allVaccins,
            'allergies' => $allAllergies,
            'educatrices' => $allEducatrices,
        ]);
    }

    //Apres l'entrée des identifiants, enregistrer enfant dans la base de donnee
    public function update(Request $request, Enfant $enfant)
    {

        //Valider les champs
        $this->validate($request, [
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'sexe' => 'required|in:homme,femme',
            'date_naissance' => 'required|date_format:Y-m-d',
        ]);

        //Creer enfant dans la base de donnees
        $eid = Enfant::updateOrCreate(

            ['id' => $enfant->id],
            [
                'name' => $request->name,
                'lastname' => $request->lastname,
                'sexe' => $request->sexe,
                'programme' => $request->programmes,
                'date_naissance' => $request->date_naissance,
                'educatrice_id' => $request->educatrices,
            ]
        )->id;


        //Ajouter les vaccins de l'enfant a partir des vaccins deja existants dans la base de données
        if (!empty($request->input('vaccins'))) {

            $vaccins = $request->input('vaccins');

            foreach ($vaccins as $vaccin) {
                $vid = Vaccin::updateOrCreate(
                    [
                        'description' => $vaccin,
                    ]
                )->id;
            }

            VaccinsEnfants::updateOrCreate([
                'enfant_id' => $eid,
                'vaccin_id' => $vid,
            ]);
        }

        //Enregistrer un vaccin de l'enfant inexistant dans la base de donnée et lui assignée
        if (!empty($request->input('vaccin'))) {
            $vid = Vaccin::updateOrCreate(
                [
                    'description' => $request->vaccin,
                ]
            )->id;

            VaccinsEnfants::updateOrCreate([
                'enfant_id' => $eid,
                'vaccin_id' => $vid,
            ]);
        }


        //Ajouter les allergies de l'enfant a partir des vaccins deja existants dans la base de données
        if (!empty($request->input('allergies'))) {

            $allergies = $request->input('allergies');

            foreach ($allergies as $allergie) {
                $alid = Allergie::updateOrCreate(
                    [
                        'description' => $allergie,
                    ]
                )->id;
            }

            AllergiesEnfants::updateOrCreate([
                'enfant_id' => $eid,
                'allergie_id' => $alid,
            ]);
        }
        //Enregistrer une allergie de l'enfant inexistant dans la base de donnée et lui assignée
        if (!empty($request->input('allergie'))) {
            $aid = Allergie::updateOrCreate(
                [
                    'description' => $request->allergie,
                ]
            )->id;

            AllergiesEnfants::updateOrCreate([
                'enfant_id' => $eid,
                'allergie_id' => $aid,
            ]);
        }

        //Enregistrer un comportement et sa description dans la base de donnée 
        if (!empty($request->input('comportement'))) {

            //Obliger une description si un probleme existe
            $this->validate($request, [
                'descriptioncomportement' => 'required|max:1000',
            ]);

            $cid = Comportement::updateOrCreate([
                'type' => $request->comportement,
                'description' => $request->descriptioncomportement,
            ])->id;

            ComportementsEnfants::updateOrCreate([
                'enfant_id' => $eid,
                'comportement_id' => $cid,
            ]);
        }

        //Enregistrer une  contrainte medicale et sa description dans la base de donnée 
        if (!empty($request->input('cmedicale'))) {

            //Obliger une description si une contrainte existe
            $this->validate($request, [
                'descriptioncmedicale' => 'required|max:1000',
            ]);

            $cmid = Cmedicale::updateOrCreate([
                'type' => $request->cmedicale,
                'description' => $request->descriptioncmedicale,
            ])->id;

            CmedicalesEnfants::updateOrCreate([
                'enfant_id' => $eid,
                'cmedicale_id' => $cmid,
            ]);
        }


        //Apres enregistrement, rediriger vers la liste des enfants
        return redirect()->route('listenfants')->with('success', 'Enfant bien modifié');
    }
}
