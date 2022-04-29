<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoDocumento;

class TipoDocumentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tipos = TipoDocumento::all();
        return view('tipoDocumento.index',compact('tipos'));
    }

    public function destroy($tiposId){
        $tipo = TipoDocumento::find($tiposId);

        $tipo->delete();
        return redirect()
            ->route('tipoDocumento.index')
            ->with('flash', 'Tipo eliminado con exito');

    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'nombre' => 'required', 
        ]);
        
        //validacion falta
        $tipo = new TipoDocumento();
        $tipo->nombre = $request->nombre;
        $tipo->save();

        return back()->with('flash', 'Tipo creado con exito');        
        
    }
    public function edit($tiposId)
    {
        $tipo = TipoDocumento::find($tiposId);
        return view('tipoDocumento.editar', 
        compact('tipo'));

    
    }

    public function update(Request $request, $tiposId)
    {

        $this->validate($request, [
            'nombre' => 'required',
        ]);

        $tipo = TipoDocumento::find($tiposId);
        $tipo->nombre = $request->nombre;
        $tipo->save();

        return back()->with('flash', 'Tipo actualizado con exito');        
        
    }
}
