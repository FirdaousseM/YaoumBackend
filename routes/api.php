<?php

use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ChapitreController;
use App\Http\Controllers\ProgrammeController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/*** PROGRAMMES ***/

// Créer un Programme
Route::post('programmes/create',[ProgrammeController::class,'createModule']);
// Afficher tous les programmes
Route::get('programmes',[ProgrammeController::class,'getAllProgrammes']);
// Afficher programme selon l'id
Route::get('programmes/{id}',[ProgrammeController::class,'getProgrammeById']);
// Update un programme
Route::put('programmes/{id}/edit',[ProgrammeController::class,'updateProgramme']);
// Supprimer un programme
Route::delete('programmes/{id}/edit',[ProgrammeController::class,'deleteProgramme']);


/*** MODULES ***/

// Créer un module
Route::post('modules/create',[ModuleController::class,'createModule']);
// Afficher tous les modules
Route::get('modules',[ModuleController::class,'getAllModules']);
// Afficher un module selon l'id
Route::get('modules/{id}',[ModuleController::class,'getModuleById']);
// Update un module
Route::put('modules/{id}/edit',[ModuleController::class,'updateModule']);
// Supprimer un module
Route::delete('modules/{id}/edit',[ModuleController::class,'deleteModule']);

/*** CHAPITRES ***/

// get ordreDoc
Route::get('modules/{idMod}/edit/content/create', [ChapitreController::class, 'getOrdreDoc']); 
// Créer un chapitre
Route::post('modules/{id}/edit/content/create',[ChapitreController::class,'createChapitre']);
// get les chapitres d'un module à editer
Route::get('modules/{id}/edit/content',[ChapitreController::class,'getAllChapitresEditable']);
// get un chapitre par idChap
Route::get('modules/{idMod}/edit/content/{idChap}',[ChapitreController::class,'getChapitre']);
// Update un chapitre
Route::put('modules/{idMod}/edit/content/{idChap}',[ChapitreController::class,'updateChapitre']);
// Supprimer un chapitre
Route::delete('modules/{idMod}/edit/content/{idChap}',[ChapitreController::class,'deleteChapitre']);








