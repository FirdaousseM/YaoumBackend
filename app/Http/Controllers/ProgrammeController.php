<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    public function getAllProgrammes()
    {
        return response()->json(Programme::all());
    }

    public function getProgrammeById($id)
    {

        $programme = array();
        array_push($programme, Programme::find($id));

        
        foreach(ModuleController::getAllModulesByIdProgramme($id) as $chapitre){
            array_push($programme, $chapitre);
        }

        return response()->json($programme);
    }

    public function createProgramme(Request $requete)
    {

        $programme = Programme::create($requete->all());
        return response($programme);
    }

    public function updateProgramme(Request $request, $id)
    {
        $programme = Programme::find($id);

        if (is_null($programme))
            return response()->json(['message' => 'pas de Programme pour cette id'], 404);

        $programme->update($request->all());
        return response()->json($programme);
    }

    public function deleteProgramme($id)
    {
        $programme = Programme::find($id);

        if (is_null($programme))
            return response()->json(['message' => 'pas de Programme pour cette id'], 404);

        $programme->delete();
        return response(null);
    }
}
