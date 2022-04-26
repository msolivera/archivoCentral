<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstadoCivil;

class EstadoCivilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $estadosCiviles = EstadoCivil::all();
        return view('estadoCivil.index',compact('estadosCiviles'));
    }
    public function destroy($estadoCivilId){
        $estadoCivil = EstadoCivil::find($estadoCivilId);

        $estadoCivil->delete();
        return redirect()
            ->route('estadoCivil.index')
            ->with('flash', 'Estado Civil eliminado con exito');

    }
    public function store (Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required', 
        ]);
        
        $estadoCivil = new EstadoCivil();
        $estadoCivil->nombre = $request->nombre;
        $estadoCivil->save();

        return back()->with('flash', 'Estado Civil creado con exito');        
    }
    public function edit($estadoCivilId)
    {
        $estadoCivil = EstadoCivil::find($estadoCivilId);
        return view('estadoCivil.editar', 
        compact('estadoCivil'));
    }
    
    public function update (Request $request, $estadoCivilId)
    {
        $this->validate($request, [
            'nombre' => 'required',
        ]);
        
        $estadoCivil = EstadoCivil::find($estadoCivilId);
        $estadoCivil->nombre = $request->nombre;
        $estadoCivil->save();

        return back()->with('flash', 'Estado Civil actualizado con exito');        
    }
}
