<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parientes;

class ParientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $parientes = Parientes::all();
        return view('parientes.index',compact('parientes'));
    }

    public function destroy($parienteId){
        $parente = Parientes::find($parienteId);

        $parente->delete();
        return redirect()
            ->route('parientes.index')
            ->with('flash', 'Pariente eliminado con exito');

    }

    public function store(Request $request, $fichaPerId)
    {
        
        $this->validate($request, [
            'nombre' => 'required', 
        ]);
        
        //validacion falta
        $pariente = new Parientes();
        $pariente->ficha_personal_id = $fichaPerId;
        $pariente->ficha_pariente_id = $request->ficha_pariente_id;
        $pariente->parentesco_id = $request->parentesco_id;
        $pariente->save();

        return $pariente;

        //return back()->with('flash', 'Pariente creado con exito');        
        
    }
    public function edit($parienteId)
    {
        $pariente = Parientes::find($parienteId);
        return view('parientes.editar', 
        compact('pariente'));

    
    }

    public function update(Request $request, $parienteId)
    {

        $this->validate($request, [
            'nombre' => 'required',
        ]);

        $pariente = Parientes::find($parienteId);
        $pariente->ficha_personal_id = $request->ficha_personal_id;
        $pariente->ficha_pariente_id = $request->ficha_pariente_id;
        $pariente->parentesco_id = $request->parentesco_id;
        $pariente->save();

        return back()->with('flash', 'Pariente actualizado con exito');        
        
    }
}
