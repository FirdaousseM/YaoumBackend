<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapitre;

class ChapitreController extends Controller
{

    public static function getAllChapitresByIdModule($id)
    {
        $chapitres = Chapitre::all()->where('id_module', $id)->sortBy("ordre_doc");

        return $chapitres;
    }

    public function getAllChapitresEditable($id)
    {

        $chapitres = array();
        foreach ($this->getAllChapitresByIdModule($id) as $unChapitre) {
            array_push($chapitres, $unChapitre);
        }
        return response()->json($chapitres);
    }

    public function createChapitre(Request $requete)
    {
        $chapitre = Chapitre::create($requete->all());
        return response($chapitre);
    }

    public function updateChapitre(Request $request, $idMod, $idChap)
    {
        $chapitre = Chapitre::find($idChap);

        if (is_null($chapitre))
            return response()->json(['message' => 'pas de Chapitre a l\'id' . $idChap], 404);

        $chapitre->update($request->all());
        return response()->json($chapitre);
    }

    public function deleteChapitre($idMod, $idChap)
    {
        $chapitre = Chapitre::find($idChap);
        if (is_null($chapitre))
            return response()->json(['message' => 'pas de Chapitre pour cette id'], 404);

        $chapitre->delete();
        return response(null);
    }

    public function getChapitre($idMod, $idChap)
    {
        return response()->json(Chapitre::find($idChap));
    }

    public function getOrdreDoc($idMod){
        $ordreDoc = Chapitre::where('id_module', $idMod)->max('ordre_doc'); 

        return response()->json($ordreDoc);
    }
}
