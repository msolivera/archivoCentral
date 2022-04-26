<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fuerza;

class FuerzaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $fuerzas = Fuerza::all();
        return view('fuerza.index',compact('fuerzas'));
    }

    public function destroy($fuerzaId){
        $fuerza = Fuerza::find($fuerzaId);

        $fuerza->delete();
        return redirect()
            ->route('fuerza.index')
            ->with('flash', 'Fuerza eliminada con exito');

    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'nombre' => 'required', 
        ]);

        $fuerza = new Fuerza();
        $fuerza->nombre = $request->nombre;
        $fuerza->save();

        return back()->with('flash', 'Fuerza creada con exito');        
        
    }
    public function edit($fuerzaId)
    {
        $fuerza = Fuerza::find($fuerzaId);
        return view('fuerza.editar', 
        compact('fuerza'));

    
    }

    public function update(Request $request, $fuerzaId)
    {

        $this->validate($request, [
            'nombre' => 'required',
        ]);

        $fuerza = Fuerza::find($fuerzaId);
        $fuerza->nombre = $request->nombre;
        $fuerza->save();

        return back()->with('flash', 'Fuerza actualizada con exito');        
        
    }
}
