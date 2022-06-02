<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FichaPersonalDomicilio;

class FichaPersonalDomicilioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    //funcion que se encarga de insertar las ideologias de la persona.
    public function store(Request $request, $fichaPersonalId){

        
        $fichaPerDomicilio = new FichaPersonalDomicilio();
        $fichaPerDomicilio->domicilio_id=$request->domicilio;
        $fichaPerDomicilio->fichaPersonal_id= $fichaPersonalId; 
        $fichaPerDomicilio->observacion= $request->observacion;
        
        $fichaPerDomicilio->save();

        
        return back()->with('flash', 'Domicilioesion creada con exito');

    }
    public function destroy($fichaDomicilioId){
        $fichaPerDomicilio = FichaPersonalDomicilio::find($fichaDomicilioId);
        $fichaPerDomicilio->delete();

        return back()->with('flash', 'Profesion eliminada con exito');

    }
}
