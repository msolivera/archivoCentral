<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FichaImpersonalObservaciones;

class FichaImpersonalObservacionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request, $fichaImpersonalId){      
        $observacion = new FichaImpersonalObservaciones();
        $observacion->ficha_Impersonal_id= $fichaImpersonalId; 
        $observacion->observacion= $request->observacion;        
        $observacion->save();      
        return back()->with('flash', 'Observacion creada con exito');
    }
    public function destroy($observacionId){
        $observacion = FichaImpersonalObservaciones::find($observacionId);
        $observacion->delete();
        return back()->with('flash', 'Observacion eliminada con exito');
    }
}
