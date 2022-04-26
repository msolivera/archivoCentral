<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoAnotacion;

class TipoAnotacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $tipoAnotaciones = TipoAnotacion::all();
        return view('tipoAnotaciones.index',compact('tipoAnotaciones'));
    }
    public function destroy($tipoAnotacionId){
        $tipoAnotacion = TipoAnotacion::find($tipoAnotacionId);

        $tipoAnotacion->delete();
        return redirect()
            ->route('tipoAnotacion.index')
            ->with('flash', 'Tipo de anotacion eliminado con exito');

    }
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'nombre' => 'required', 
        ]);
        
        //validacion falta
        $tipoAnotacion = new TipoAnotacion();
        $tipoAnotacion->nombre = $request->nombre;
        $tipoAnotacion->save();

        return back()->with('flash', 'Tipo de anotacion creado con exito');        
        
    }
    public function edit($tipoAnotacionId)
    {
        $tipoAnotacion = TipoAnotacion::find($tipoAnotacionId);
        return view('tipoAnotaciones.editar', 
        compact('tipoAnotacion'));

    

    }
    public function update(Request $request, $tipoAnotacionId)
    {

        $this->validate($request, [
            'nombre' => 'required',
        ]);

        //validacion falta
        $tipoAnotacion = TipoAnotacion::find($tipoAnotacionId);
        $tipoAnotacion->nombre = $request->nombre;
        $tipoAnotacion->save();

        return back()->with('flash', 'Tipo de anotacion creado con exito');        
        
    }
    
}
