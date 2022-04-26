<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ideologia;

class IdeologiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ideologias = Ideologia::all();
        return view('ideologia.index',compact('ideologias'));
    }

    public function destroy($ideologiaId){
        $ideologia = Ideologia::find($ideologiaId);

        $ideologia->delete();
        return redirect()
            ->route('ideologia.index')
            ->with('flash', 'Ideologia eliminada con exito');

    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'nombre' => 'required', 
        ]);
        
        //validacion falta
        $ideologia = new Ideologia();
        $ideologia->nombre = $request->nombre;
        $ideologia->save();

        return back()->with('flash', 'Ideologia creada con exito');        
        
    }
    public function edit($ideologiaId)
    {
        $ideologia = Ideologia::find($ideologiaId);
        return view('ideologia.editar', 
        compact('ideologia'));

    
    }

    public function update(Request $request, $ideologiaId)
    {

        $this->validate($request, [
            'nombre' => 'required',
        ]);

        $ideologia = Ideologia::find($ideologiaId);
        $ideologia->nombre = $request->nombre;
        $ideologia->save();

        return back()->with('flash', 'Ideologia actualizada con exito');        
        
    }
}
