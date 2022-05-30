<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidad;

class UnidadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $unidades = Unidad::all();
        return view('unidad.index',compact('unidades'));
    }

    public function destroy($unidadId){
        $unidad = Unidad::find($unidadId);

        $unidad->delete();
        return redirect()
            ->route('unidad.index')
            ->with('flash', 'Unidad eliminada con exito');

    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'nombre' => 'required', 
        ]);
        
        //validacion falta
        $unidad = new Unidad();
        $unidad->sigla = $request->sigla;
        $unidad->nombre = $request->nombre;
        $unidad->save();

        return back()->with('flash', 'Unidad creada con exito');        
        
    }
    public function edit($unidadId)
    {
        $unidad = Unidad::find($unidadId);
        return view('unidad.editar', 
        compact('unidad'));

    
    }

    public function update(Request $request, $unidadId)
    {

        $this->validate($request, [
            'nombre' => 'required',
        ]);

        $unidad = Unidad::find($unidadId);
        $unidad->nombre = $request->nombre;
        $unidad->sigla = $request->sigla;
        $unidad->save();

        return back()->with('flash', 'Unidad actualizada con exito');        
        
    }
}
