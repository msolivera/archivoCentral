<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FichaPersonalIdeologia;

class FichaPersonalIdeologiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    //funcion que se encarga de insertar las ideologias de la persona.
    public function store(Request $request, $fichaPersonalId){

        
        $fichaPerIdeo = new FichaPersonalIdeologia();
        $fichaPerIdeo->ideologia_id=$request->ideologia;
        $fichaPerIdeo->fichaPersonal_id= $fichaPersonalId;
        
        $fichaPerIdeo->save();

        
        return back()->with('flash', 'Ideología creada con exito');

    }
    public function destroy($fichaIdeologiaId){
        $fichaPerIdeo = FichaPersonalIdeologia::find($fichaIdeologiaId);
        $fichaPerIdeo->delete();

        return back()->with('flash', 'Ideologia eliminada con exito');

    }
}
