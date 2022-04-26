<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizacion;

class OrganizacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $organizaciones = Organizacion::all();
        return view('organizacion.index',compact('organizaciones'));
    }

    public function destroy($organizacionId){
        $organizacion = Organizacion::find($organizacionId);

        $organizacion->delete();
        return redirect()
            ->route('organizacion.index')
            ->with('flash', 'Organización eliminada con exito');

    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'nombre' => 'required', 
        ]);
        
        //validacion falta
        $organizacion = new Organizacion();
        $organizacion->nombre = $request->nombre;
        $organizacion->save();

        return back()->with('flash', 'Organización creada con exito');        
        
    }
    public function edit($organizacionId)
    {
        $organizacion = Organizacion::find($organizacionId);
        return view('organizacion.editar', 
        compact('organizacion'));

    
    }

    public function update(Request $request, $organizacionId)
    {

        $this->validate($request, [
            'nombre' => 'required',
        ]);

        $organizacion = Organizacion::find($organizacionId);
        $organizacion->nombre = $request->nombre;
        $organizacion->save();

        return back()->with('flash', 'Organización actualizada con exito');        
        
    }
}
