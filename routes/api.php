<?php

use App\Http\Controllers\ModuleController;
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


/*** MODULES ***/

// Créer un module
Route::post('modules/create',[ModuleController::class,'createModule']);
// Afficher tous les modules
Route::get('modules',[ModuleController::class,'getModule']);
// Afficher un module selon l'id
Route::get('modules/{id}',[ModuleController::class,'getModuleById']);
// Update un module
Route::put('modules/{id}/edit',[ModuleController::class,'updateModule']);
// Supprimer un module
Route::delete('modules/{id}/edit',[ModuleController::class,'deleteModule']);


