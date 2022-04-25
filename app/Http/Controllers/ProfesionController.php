<?php

namespace App\Http\Controllers;
use App\Models\Profesion;

use Illuminate\Http\Request;

class ProfesionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $profesiones = Profesion::all();
        return view('profesiones.index',compact('profesiones'));
    }

    public function destroy($profesionId){
        $profesion = Profesion::find($profesionId);

        $profesion->delete();
        return redirect()
            ->route('profesiones.index')
            ->with('flash', 'Profesion eliminada con exito');

    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'nombre' => 'required', 
        ]);
        
        //validacion falta
        $profesion = new Profesion();
        $profesion->nombre = $request->nombre;
        $profesion->save();

        return back()->with('flash', 'Profesion creada con exito');        
        
    }

    public function edit($profesionId)
    {
        $profesion = Profesion::find($profesionId);
        return view('profesiones.editar', 
        compact('profesion'));

    
    }

    public function update(Request $request, $profesionId)
    {

        $this->validate($request, [
            'nombre' => 'required',
        ]);
        
        $profesion = Profesion::find($profesionId);
        $profesion->nombre = $request->nombre;
        $profesion->save();

        return back()->with('flash', 'Profesion actualizada con exito');
    }
}
