<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RolOrganizacion;

class RolOrganizacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    //funcion que se encarga de insertar las ideologias de la persona.
    public function store(Request $request, $fichaPersonalId){

        
        $rolOrganizacion = new RolOrganizacion();
        $rolOrganizacion->nombre=$request->nombre;
        $rolOrganizacion->ficha_Personal_id= $fichaPersonalId; 
        $rolOrganizacion->observacion= $request->observacion;
        $rolOrganizacion->organizacion_id= $request->organizacion;
        
        $rolOrganizacion->save();

        
        return back()->with('flash', 'Rol creado con exito');

    }
    public function destroy($rolOrganizacionId){
        $rolOrganizacion = RolOrganizacion::find($rolOrganizacionId);
        $rolOrganizacion->delete();

        return back()->with('flash', 'Rol eliminado con exito');

    }
}
