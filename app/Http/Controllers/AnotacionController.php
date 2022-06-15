<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anotacion;

class AnotacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    //funcion que se encarga de insertar las ideologias de la persona.
    public function store(Request $request, $fichaPersonalId){

        
        $anotacion = new Anotacion();
        $anotacion->nombre=$request->nombre;
        $anotacion->ficha_Personal_id= $fichaPersonalId; 
        $anotacion->tipo_Anotacion_id= $request->tipo_anotacion;
        
        $anotacion->save();

        
        return back()->with('flash', 'Anotacion creada con exito');

    }
    public function destroy($anotacionId){
        $anotacion = Anotacion::find($anotacionId);
        $anotacion->delete();

        return back()->with('flash', 'Anotacion eliminada con exito');

    }
}
