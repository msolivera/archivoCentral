<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudio;

class EstudioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    //funcion que se encarga de insertar las ideologias de la persona.
    public function store(Request $request, $fichaPersonalId)
    {


        $estudio = new Estudio();
        $estudio->fichaPersonal_id = $fichaPersonalId;
        $estudio->nombreEstudio = $request->nombreEstudio;
        $estudio->completado = $request->completado;
        $estudio->nombreInstituto = $request->nombreInstituto;
        $estudio->tipoInstituto = $request->tipoInstituto;
        $estudio->nivelAcademico = $request->nivelAcademico;

        $estudio->save();


        return back()->with('flash', 'Estudio creado con exito');
    }
    public function destroy($estudioId)
    {
        $estudio = Estudio::find($estudioId);
        $estudio->delete();

        return back()->with('flash', 'Estudio eliminado con exito');
    }
}
