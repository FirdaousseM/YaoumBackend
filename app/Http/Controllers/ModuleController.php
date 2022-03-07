<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;

class ModuleController extends Controller
{






    
    public function getModule(){

        return response()->json(Module::all());
      
    }
}
