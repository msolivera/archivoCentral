<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FuenteDocumento;

class FuenteDocumentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $fuentes = FuenteDocumento::all();
        return view('fuenteDocumento.index',compact('fuentes'));
    }

    public function destroy($fuenteId){
        $fuente = FuenteDocumento::find($fuenteId);

        $fuente->delete();
        return redirect()
            ->route('fuenteDocumento.index')
            ->with('flash', 'Tipo eliminado con exito');

    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'nombre' => 'required', 
        ]);
        
        //validacion falta
        $fuente = new FuenteDocumento();
        $fuente->nombre = $request->nombre;
        $fuente->save();

        return back()->with('flash', 'Tipo creado con exito');        
        
    }
    public function edit($fuenteId)
    {
        $fuente = FuenteDocumento::find($fuenteId);
        return view('fuenteDocumento.editar', 
        compact('fuente'));

    
    }

    public function update(Request $request, $fuenteId)
    {

        $this->validate($request, [
            'nombre' => 'required',
        ]);

        $fuente = FuenteDocumento::find($fuenteId);
        $fuente->nombre = $request->nombre;
        $fuente->save();

        return back()->with('flash', 'Tipo actualizado con exito');        
        
    }
}

