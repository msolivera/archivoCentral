<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PalabraClave;

class PalabraClaveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $palabrasClave = PalabraClave::all();
        return view('palabrasClave.index',compact('palabrasClave'));
    }
    public function destroy($palabraClaveId){
        $palabraClave = PalabraClave::find($palabraClaveId);

        $palabraClave->delete();
        return redirect()
            ->route('palabraClave.index')
            ->with('flash', 'Palabra Clave eliminada con exito');

    }
    
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'nombre' => 'required', 
        ]);
        
        //validacion falta
        $palabraClave = new PalabraClave();
        $palabraClave->nombre = $request->nombre;
        $palabraClave->save();

        return back()->with('flash', 'Palabra Clave creada con exito');        
        
    }
    public function edit($palabraClaveId)
    {
        $palabraClave = PalabraClave::find($palabraClaveId);
        return view('palabrasClave.editar', 
        compact('palabraClave'));

    
    }
    public function update(Request $request, $palabraClaveId)
    {

        $this->validate($request, [
            'nombre' => 'required',
        ]);
        $palabraClave = PalabraClave::find($palabraClaveId);
        $palabraClave->nombre = $request->nombre;
        $palabraClave->save();
        return back()->with('flash', 'Palabra Clave actualizada con exito');
    }
}
