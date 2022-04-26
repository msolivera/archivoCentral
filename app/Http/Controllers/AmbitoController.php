<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ambito;

class AmbitoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $ambitos = Ambito::all();
        return view('ambitos.index',compact('ambitos'));
    }
    public function destroy($ambitoId){
        $ambito = Ambito::find($ambitoId);

        $ambito->delete();
        return redirect()
            ->route('ambito.index')
            ->with('flash', 'Ambito eliminado con exito');

    }
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'nombre' => 'required', 
        ]);
        
        //validacion falta
        $ambito = new Ambito();
        $ambito->nombre = $request->nombre;
        $ambito->save();

        return back()->with('flash', 'Ambito creado con exito');        
        
    }
    public function edit($ambitoId)
    {
        $ambito = Ambito::find($ambitoId);
        return view('ambitos.editar', 
        compact('ambito'));

    
    }
    public function update(Request $request, $ambitoId)
    {

        $this->validate($request, [
            'nombre' => 'required',
        ]);

        //validacion falta
        $ambito = Ambito::find($ambitoId);
        $ambito->nombre = $request->nombre;
        $ambito->save();

        return back()->with('flash', 'Ambito actualizado con exito');        
        
    }

}
