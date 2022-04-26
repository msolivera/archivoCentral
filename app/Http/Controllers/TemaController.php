<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tema;

class TemaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $temas = Tema::all();
        return view('tema.index',compact('temas'));
    }

    public function destroy($temaId){
        $tema = Tema::find($temaId);

        $tema->delete();
        return redirect()
            ->route('tema.index')
            ->with('flash', 'Tema eliminado con exito');

    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'nombre' => 'required', 
        ]);
        
        //validacion falta
        $tema = new Tema();
        $tema->nombre = $request->nombre;
        $tema->save();

        return back()->with('flash', 'Tema creado con exito');        
        
    }
    public function edit($temaId)
    {
        $tema = Tema::find($temaId);
        return view('tema.editar', 
        compact('tema'));

    
    }

    public function update(Request $request, $temaId)
    {

        $this->validate($request, [
            'nombre' => 'required',
        ]);

        $tema = Tema::find($temaId);
        $tema->nombre = $request->nombre;
        $tema->save();

        return back()->with('flash', 'Tema actualizado con exito');        
        
    }
}
