<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ubicacion;

class UbicacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ubicaciones = Ubicacion::all();
        return view('ubicacion.index',compact('ubicaciones'));
    }

    public function destroy($ubicacionId){
        $ubicacion = Ubicacion::find($ubicacionId);

        $ubicacion->delete();
        return redirect()
            ->route('ubicacion.index')
            ->with('flash', 'Ubicacion eliminada con exito');

    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'nombre' => 'required', 
        ]);
        
        //validacion falta
        $ubicacion = new Ubicacion();
        $ubicacion->nombre = $request->nombre;
        $ubicacion->save();

        return back()->with('flash', 'Ubicacion creada con exito');        
        
    }
    public function edit($ubicacionId)
    {
        $ubicacion = Ubicacion::find($ubicacionId);
        return view('ubicacion.editar', 
        compact('ubicacion'));

    
    }

    public function update(Request $request, $ubicacionId)
    {

        $this->validate($request, [
            'nombre' => 'required',
        ]);

        $ubicacion = Ubicacion::find($ubicacionId);
        $ubicacion->nombre = $request->nombre;
        $ubicacion->save();

        return back()->with('flash', 'Ubicacion actualizada con exito');        
        
    }
}
