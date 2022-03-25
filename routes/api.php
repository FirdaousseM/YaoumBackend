<?php

use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ChapitreController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

/*** PROGRAMMES ***/


// Nécéssite d'être connecté
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Deconnexion utilisateur
    Route::post('logout', [UserController::class, 'logout']);

    //Route::get('account', [UserController::class, 'account']);
});

// Inscription nouvel utilisateur
Route::post('register', [UserController::class, 'register']);
// Connexion utilisateur
Route::post('login', [UserController::class, 'login']);








/*** PROGRAMMES ***/

// Nécéssite d'être connecté
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Créer un Programme
    Route::post('programmes/create', [ProgrammeController::class, 'createProgramme']);
    // Update un programme
    Route::put('programmes/{id}/edit', [ProgrammeController::class, 'updateProgramme']);
    // Supprimer un programme
    Route::delete('programmes/{id}/edit', [ProgrammeController::class, 'deleteProgramme']);
});


// Afficher tous les programmes
Route::get('programmes', [ProgrammeController::class, 'getAllProgrammes']);
// Afficher programme selon l'id
Route::get('programmes/{id}', [ProgrammeController::class, 'getProgrammeById']);



/*** MODULES ***/

// Nécéssite d'être connecté
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Créer un module
    Route::post('modules/create', [ModuleController::class, 'createModule']);
    // Update un module
    Route::put('modules/{id}/edit', [ModuleController::class, 'updateModule']);
    // Supprimer un module
    Route::delete('modules/{id}/edit', [ModuleController::class, 'deleteModule']);
});


// Afficher tous les modules
Route::get('modules', [ModuleController::class, 'getAllModules']);
// Afficher un module selon l'id
Route::get('modules/{id}', [ModuleController::class, 'getModuleById']);


/*** CHAPITRES ***/

// Nécéssite d'être connecté
Route::group(['middleware' => ['auth:sanctum']], function () {
    // get ordreDoc
    Route::get('modules/{idMod}/edit/content/create', [ChapitreController::class, 'getOrdreDoc']);
    // Créer un chapitre
    Route::post('modules/{id}/edit/content/create', [ChapitreController::class, 'createChapitre']);
    // Update un chapitre
    Route::put('modules/{idMod}/edit/content/{idChap}', [ChapitreController::class, 'updateChapitre']);
    // Supprimer un chapitre
    Route::delete('modules/{idMod}/edit/content/{idChap}', [ChapitreController::class, 'deleteChapitre']);
});


// get les chapitres d'un module à editer
Route::get('modules/{id}/edit/content', [ChapitreController::class, 'getAllChapitresEditable']);
// get un chapitre par idChap
Route::get('modules/{idMod}/edit/content/{idChap}', [ChapitreController::class, 'getChapitre']);
