<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArmaCuerpo;

class ArmaCuerpoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cuerpos = ArmaCuerpo::all();
        return view('armaCuerpo.index',compact('cuerpos'));
    }

    public function destroy($cuerpoId){
        $cuerpo = ArmaCuerpo::find($cuerpoId);

        $cuerpo->delete();
        return redirect()
            ->route('armaCuerpo.index')
            ->with('flash', 'Cuerpo eliminado con exito');

    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'nombre' => 'required', 
        ]);
        
        //validacion falta
        $cuerpo = new ArmaCuerpo();
        $cuerpo->sigla = $request->sigla;
        $cuerpo->nombre = $request->nombre;
        $cuerpo->save();

        return back()->with('flash', 'Cuerpo creado con exito');        
        
    }
    public function edit($cuerpoId)
    {
        $cuerpo = ArmaCuerpo::find($cuerpoId);
        return view('armaCuerpo.editar', 
        compact('cuerpo'));

    
    }

    public function update(Request $request, $cuerpoId)
    {

        $this->validate($request, [
            'nombre' => 'required',
        ]);

        //validacion falta
        $cuerpo = ArmaCuerpo::find($cuerpoId);
        $cuerpo->sigla = $request->sigla;
        $cuerpo->nombre = $request->nombre;
        $cuerpo->save();

        return back()->with('flash', 'Cuerpo creado con exito');        
        
    }
}
