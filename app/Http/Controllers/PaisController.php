<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;

class PaisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $paises = Pais::all();
        return view('paises.index',compact('paises'));
    }

    public function destroy($paisId){
        $pais = Pais::find($paisId);

        $pais->delete();
        return redirect()
            ->route('paises.index')
            ->with('flash', 'Pais eliminado con exito');

    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'nombre' => 'required', 
        ]);
        
        //validacion falta
        $pais = new Pais();
        $pais->nombre = $request->nombre;
        $pais->save();

        return back()->with('flash', 'País creado con exito');        
        
    }
    public function edit($paisId)
    {
        $pais = Pais::find($paisId);
        return view('paises.editarPais', 
        compact('pais'));

    
    }

    public function update(Request $request, $paisId)
    {

        $this->validate($request, [
            'nombre' => 'required',
        ]);
        
        $pais = Pais::find($paisId);
        $pais->nombre = $request->nombre;
        $pais->save();

        return back()->with('flash', 'Pais actualizado con exito');
    }
}
