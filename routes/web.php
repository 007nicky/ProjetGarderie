<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Enfant\EnfantController;
use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\Enfant\AjoutEnfantController;
use App\Http\Controllers\Activites\ActivitesController;
use App\Http\Controllers\Admin\AddEducatriceController;
use App\Http\Controllers\Admin\AddFormationsController;
use App\Http\Controllers\Admin\RegisterAdminController;
use App\Http\Controllers\Enfant\ListeEnfantsController;
use App\Http\Controllers\Educatrice\EducatriceController;
use App\Http\Controllers\Enfant\ModifierEnfantController;
use App\Http\Controllers\Admin\ListeEducatricesController;
use App\Http\Controllers\Enfant\AjouterPaiementController;
use App\Http\Controllers\Enfant\AjouterIncidenceController;
use App\Http\Controllers\Activites\InscrireEnfantController;
use App\Http\Controllers\Activites\ListeActivitesController;
use App\Http\Controllers\Activites\AjouterActiviteController;
use App\Http\Controllers\Activites\ModifierActiviteController;
use App\Http\Controllers\Educatrice\LoginEducatriceController;
use App\Http\Controllers\Enfant\ModifierDetailsEnfantController;
use App\Http\Controllers\Educatrice\ModifierEducatriceController;


//Route vers la vue de la page principale de l'admin 
Route::get('/admin', [AdminController::class, 'index'])->name('pageAdmin');

//Route vers la vue de la page principale de l'enfant
Route::get('/enfant/{enfant}', [EnfantController::class, 'index'])->name('pageEnfant');

//Route vers la vue de la liste des enfants
Route::get('/listeEnfants', [ListeEnfantsController::class, 'index'])->name('listenfants');

//Route vers la vue de la liste des educatrices
Route::get('/listeEducatrices', [ListeEducatricesController::class, 'index'])->name('listeducatrices');

//Route vers la vue de la page principale de l'educatrice apres authentification
Route::get('/educatrice/{educatrice?}', [EducatriceController::class, 'index'])->name('pageEducatrice');

//Route vers la vue de la page de creation de l'admin
Route::get('/registerAdmin', [RegisterAdminController::class, 'index'])->name('register');
Route::post('/registerAdmin', [RegisterAdminController::class, 'check']);

//Route vers la vue de la page d'authentification de l'admin
Route::get('/loginAdmin', [LoginAdminController::class, 'index'])->name('login');
Route::post('/loginAdmin', [LoginAdminController::class, 'check']);

//Route vers la vue de la page de creation de l'educatrice
Route::get('/ajouterEducatrice', [AddEducatriceController::class, 'index'])->name('registereducatrice');
Route::post('/ajouterEducatrice', [AddEducatriceController::class, 'check']);

//Route vers la vue de la page de modification des details de l'enfant
Route::get('/modifierEducatrice/{educatrice?}', [ModifierEducatriceController::class, 'index'])->name('modifiereducatrice');
Route::post('/modifierEducatrice/{educatrice?}', [ModifierEducatriceController::class, 'update']);

//Route vers la vue de la page d'authentification de l'admin
Route::get('/loginEducatrice', [LoginEducatriceController::class, 'index'])->name('logineducatrice');
Route::post('/loginEducatrice', [LoginEducatriceController::class, 'check']);

//Route vers la vue de la page de creation de l'enfant
Route::get('/ajouterEnfant', [AjoutEnfantController::class, 'index'])->name('ajouterenfant');
Route::post('/ajouterEnfant', [AjoutEnfantController::class, 'check']);

//Route vers la vue de la page de modification des details de l'enfant
Route::get('/modifierEnfant/{enfant?}', [ModifierEnfantController::class, 'index'])->name('modifierenfant');
Route::post('/modifierEnfant/{enfant?}', [ModifierEnfantController::class, 'update']);

//Route vers la vue de la page de modification des incidences de l'enfant
Route::get('/modifierIncident/{enfant?}', [AjouterIncidenceController::class, 'index'])->name('modifierincidence');
Route::post('/modifierIncident/{enfant?}', [AjouterIncidenceController::class, 'update']);

//Route vers la vue de la page de modification des details des tuteurs/recuperateurs l'enfant
Route::get('/modifierDetailsTuteur/{tuteur?}/enfant/{enfant?}', [ModifierDetailsEnfantController::class, 'tuteur'])->name('modifierDetailsTuteur');
Route::post('/modifierDetailsTuteur/{tuteur?}/enfant/{enfant?}', [ModifierDetailsEnfantController::class, 'updateTuteur']);
Route::post('/ajouterDetailsTuteur/{enfant?}', [ModifierDetailsEnfantController::class, 'addTuteur'])->name('ajouterDetailsTuteur');

Route::get('/ajouterDetailsRecuperateur/{enfant?}', [ModifierDetailsEnfantController::class, 'recuperateur'])->name('modifierDetailsRecuperateur');
Route::post('/ajouterDetailsRecuperateur/{enfant?}', [ModifierDetailsEnfantController::class, 'addRecuperateur']);

//Route vers la vue de la page de creation d'activité
Route::get('/ajouterActivite', [AjouterActiviteController::class, 'index'])->name('ajouteractivite');
Route::post('/ajouterActivite', [AjouterActiviteController::class, 'check']);

//Route vers la vue de la page de modification d'activité
Route::get('/modifierActivite/{activites?}', [ModifierActiviteController::class, 'index'])->name('modifieractivite');
Route::post('/modifierActivite/{activites?}', [ModifierActiviteController::class, 'update']);

//Route vers la vue de la page d'inscription d'un enfant a une activité
Route::get('/inscrireEnfant/{activites?}', [InscrireEnfantController::class, 'index'])->name('inscrireenfant');
Route::post('/inscrireEnfant/{activites?}', [InscrireEnfantController::class, 'check']);

//Route vers la vue de la page d'ajout des paiements de l'enfant
//Route::get('/ajouterPaiement/{enfant?}', [AjouterPaiementController::class, 'index'])->name('ajouterpaiement');
Route::post('/ajouterPaiement/{enfant?}', [AjouterPaiementController::class, 'update'])->name('ajouterpaiement');

//Route vers la vue de la liste des activites
Route::get('/listeActivites', [ListeActivitesController::class, 'index'])->name('listeactivites');

//Route vers la vue de la page principale des activites
Route::get('/activite/{activites?}', [ActivitesController::class, 'index'])->name('pageActivite');

//Route vers la vue de deconnection
Route::get('/logout', [LogoutController::class, 'check'])->name('logout');


//Route vers la vue de la page d'acceuil
Route::get('/', function () {
    return view('principale.app');
})->name('acceuil');
