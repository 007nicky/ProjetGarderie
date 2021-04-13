<?php

namespace App\Http\Controllers\Enfant;

use App\Models\Enfant;
use App\Models\Tuteur;
use App\Models\Vaccin;
use App\Models\Allergie;
use App\Models\Educatrice;
use App\Models\Comportement;
use App\Models\Recuperateur;
use Illuminate\Http\Request;
use App\Http\Middleware\admin;
use App\Models\VaccinsEnfants;
use App\Models\AllergiesEnfants;
use App\Http\Controllers\Controller;
use App\Models\Cmedicale;
use App\Models\CmedicalesEnfants;
use App\Models\ComportementsEnfants;

class AjoutEnfantController extends Controller
{

    //fonction d'affichage de registration page
    public function index()
    {

        //Extraire la liste des vaccins de la base de données
        $allVaccins = Vaccin::get();

        //Extraire la liste des allergies de la base de données
        $allAllergies = Allergie::get();

        //Extraire la liste des educatrices de la base de données
        $allEducatrices = Educatrice::get();

        //Retourner la liste a la vue correspondante
        return view('enfant.ajoutEnfant', [
            'vaccins' => $allVaccins,
            'allergies' => $allAllergies,
            'educatrices' => $allEducatrices,
        ]);
    }

    //Apres l'entrée des identifiants, enregistrer enfant dans la base de donnee
    public function check(Request $request)
    {

        //Valider les champs
        $this->validate($request, [
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'sexe' => 'required|in:homme,femme',
            'programmes' => 'required|not_in:0',
            'date_naissance' => 'required|date_format:Y-m-d',


            'tuteurname' => 'required|max:255',
            'tuteurlastname' => 'required|max:255',
            'tuteuremail' => 'required|email|max:255',
            'tuteurphone' => 'required|digits:10',
            'tuteur' => 'required|in:principale,secondaire',


            'recuperateurname' => 'required|max:255',
            'recuperateurlastname' => 'required|max:255',
            'recuperateuremail' => 'required|email|max:255',
            'recuperateurphone' => 'required|digits:10',

        ]);

        //Creer enfant dans la base de donnees
        $eid = Enfant::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'sexe' => $request->sexe,
            'programme' => $request->programmes,
            'date_naissance' => $request->date_naissance,
            'educatrice_id' => $request->educatrices,
        ])->id;

        //Creer tuteur dans la base de donnees
        Tuteur::create([
            'name' => $request->tuteurname,
            'lastname' => $request->tuteurlastname,
            'email' => $request->tuteuremail,
            'phonenumber' => $request->tuteurphone,
            'type' => $request->tuteur,
            'enfant_id' => $eid,
        ]);

        //Creer Recuperateur dans la base de donnees
        Recuperateur::create([
            'name' => $request->recuperateurname,
            'lastname' => $request->recuperateurlastname,
            'email' => $request->recuperateuremail,
            'phonenumber' => $request->recuperateurphone,
            'enfant_id' => $eid,
        ]);

        //Ajouter les vaccins de l'enfant a partir des vaccins deja existants dans la base de données
        if (!empty($request->input('vaccins'))) {

            $vaccins = $request->input('vaccins');

            foreach ($vaccins as $vaccin) {
                $vid = Vaccin::firstOrCreate([
                    'description' => $vaccin,
                ])->id;
            }

            VaccinsEnfants::create([
                'enfant_id' => $eid,
                'vaccin_id' => $vid,
            ]);
        }
        //Enregistrer un vaccin de l'enfant inexistant dans la base de donnée et lui assignée
        if (!empty($request->input('vaccin'))) {
            $vid = Vaccin::firstOrCreate([
                'description' => $request->vaccin,
            ])->id;

            VaccinsEnfants::create([
                'enfant_id' => $eid,
                'vaccin_id' => $vid,
            ]);
        }

        //Ajouter les allergies de l'enfant a partir des allergies deja existants dans la base de données
        if (!empty($request->input('allergies'))) {

            $allergies = $request->input('allergies');

            foreach ($allergies as $allergie) {
                $aid = Allergie::firstOrCreate([
                    'description' => $allergie,
                ])->id;
            }

            AllergiesEnfants::create([
                'enfant_id' => $eid,
                'allergie_id' => $aid,
            ]);
        }
        //Enregistrer un vaccin de l'enfant inexistant dans la base de donnée et lui assignée
        if (!empty($request->input('allergie'))) {
            $aid = Allergie::firstOrCreate([
                'description' => $request->allergie,
            ])->id;

            AllergiesEnfants::create([
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

            $cid = Comportement::firstOrCreate([
                'type' => $request->comportement,
                'description' => $request->descriptioncomportement,
            ])->id;

            ComportementsEnfants::create([
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

            $cmid = Cmedicale::firstOrCreate([
                'type' => $request->cmedicale,
                'description' => $request->descriptioncmedicale,
            ])->id;

            CmedicalesEnfants::create([
                'enfant_id' => $eid,
                'cmedicale_id' => $cmid,
            ]);
        }

        //Apres enregistrement, rediriger vers la liste des enfants
        return redirect()->route('listenfants');
    }
}
