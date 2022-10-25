<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DossierObservaciones;

class DossierObservacionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request, $dossierId){      
        $observacion = new DossierObservaciones();
        $observacion->dossier_id= $dossierId; 
        $observacion->observacion= $request->observacion;        
        $observacion->save();      
        return back()->with('flash', 'Observacion creada con exito');
    }
    public function destroy($observacionId){
        $observacion = DossierObservaciones::find($observacionId);
        $observacion->delete();
        return back()->with('flash', 'Observacion eliminada con exito');
    }
}
