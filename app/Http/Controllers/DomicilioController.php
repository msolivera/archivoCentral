<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domicilio;

class DomicilioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    //funcion que se encarga de insertar las ideologias de la persona.
    public function store(Request $request, $fichaPersonalId){

       
        $domicilio = new Domicilio();
        $domicilio->ficha_Personal_id= $fichaPersonalId; 
        $domicilio->domicilio= $request->domicilio;
        
        $domicilio->save();

        
        return back()->with('flash', 'Domicilio creado con exito');

    }
    public function destroy($domicilioId){
        $domicilio = Domicilio::find($domicilioId);
        $domicilio->delete();

        return back()->with('flash', 'Domicilio eliminado con exito');

    }
}
