<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clasificacion;

class ClasificacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clasificaciones = Clasificacion::all();
        return view('clasificacion.index',compact('clasificaciones'));
    }

    public function destroy($clasificacionId){
        $clasificacion = Clasificacion::find($clasificacionId);

        $clasificacion->delete();
        return redirect()
            ->route('clasificacion.index')
            ->with('flash', 'Clasificacion eliminado con exito');

    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'nombre' => 'required', 
        ]);
        
        //validacion falta
        $clasificacion = new Clasificacion();
        $clasificacion->nombre = $request->nombre;
        $clasificacion->save();

        return back()->with('flash', 'Clasificacion creado con exito');        
        
    }
    public function edit($clasificacionId)
    {
        $clasificacion = Clasificacion::find($clasificacionId);
        return view('clasificacion.editar', 
        compact('clasificacion'));

    
    }

    public function update(Request $request, $clasificacionId)
    {

        $this->validate($request, [
            'nombre' => 'required',
        ]);

        //validacion falta
        $clasificacion = Clasificacion::find($clasificacionId);
        $clasificacion->nombre = $request->nombre;
        $clasificacion->save();

        return back()->with('flash', 'Clasificacion creado con exito');        
        
    }
}
