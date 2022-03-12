<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;

class ModuleController extends Controller
{
    public function getModule()
    {
        return response()->json(Module::all());
    }

    public function getModuleById($id)
    {

        $module = Module::find($id);

        // if (is_null($module))
        //     return response()->json(['message' => 'pas de module pour cette id'], 404);

        return response()->json($module);
    }

    public function createModule(Request $requete)
    {

        $module = Module::create($requete->all());
        return response($module);
    }

    public function updateModule(Request $request, $id)
    {
        $module = Module::find($id);

        if (is_null($module))
            return response()->json(['message' => 'pas de module pour cette id'], 404);

        $module->update($request->all());
        return response()->json($module);
    }

    public function deleteModule($id)
    {
        $module = Module::find($id);

        if (is_null($module))
            return response()->json(['message' => 'pas de module pour cette id'], 404);

        $module->delete();
        return response(null);
    }
}
