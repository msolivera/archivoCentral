<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FichaPersonalProfesion;

class FichaPersonalProfesionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    //funcion que se encarga de insertar las ideologias de la persona.
    public function store(Request $request, $fichaPersonalId){

        
        $fichaPerProf = new FichaPersonalProfesion();
        $fichaPerProf->profesion_id=$request->profesion;
        $fichaPerProf->fichaPersonal_id= $fichaPersonalId; 
        $fichaPerProf->observacion= $request->observacion;
        
        $fichaPerProf->save();

        
        return back()->with('flash', 'Profesion creada con exito');

    }
    public function destroy($fichaProfesionId){
        $fichaPerProf = FichaPersonalProfesion::find($fichaProfesionId);
        $fichaPerProf->delete();

        return back()->with('flash', 'Profesion eliminada con exito');

    }
}
