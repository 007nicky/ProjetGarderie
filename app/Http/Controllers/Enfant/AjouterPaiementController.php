<?php

namespace App\Http\Controllers\Enfant;

use App\Models\Enfant;
use App\Models\Paiement;
use App\Models\Activites;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjouterPaiementController extends Controller
{

    //Apres l'entrée des identifiants, enregistrer paiement dans la base de donnee
    public function update(Request $request, Enfant $enfant)
    {

        //Valider les champs
        $this->validate($request, [
            'montant' => 'required|numeric|between:0,99.99',
            'date_paiement' => 'required|date_format:Y-m-d',
            'heure_paiement' => 'required|date_format:H:i',
            'activites' => 'required',
        ]);

        //Creer enfant dans la base de donnees
        Paiement::firstOrCreate(
            [
                'montant' => $request->montant,
                'date_paiement' => $request->date_paiement,
                'heure_paiement' => $request->heure_paiement,
                'activites_id' => $request->activites,
                'enfant_id' => $enfant->id,
            ]
        )->id;


        //Apres enregistrement, rediriger vers la liste des enfants
        return redirect()->route('listenfants')->with('success', 'Enfant bien modifié');
    }
}
