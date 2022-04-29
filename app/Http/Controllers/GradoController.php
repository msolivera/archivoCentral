<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fuerza;
use App\Models\Grado;

class GradoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

        $grados = Grado::all();
        return view('grados.index',compact('grados'));

    }

    public function create()
    {
        $fuerzas = Fuerza::all();
        return view('grados.crear' ,compact('fuerzas'));
    }

    public function store(Request $request)
    {

        
        $grado = new Grado();
        $grado->sigla = $request->sigla;
        $grado->nombre = $request->nombre;
        $grado->fuerza_id = $request->fuerza_id;
        $grado->save();

        return back()->with('flash', 'Grado creado con exito');        
        
    }


    public function edit($gradoId)
    {
        $grado = Grado::find($gradoId);
        $fuerzas = Fuerza::all();

        //consigo la fuerza del grado
        $resGrado = Fuerza::where('id', $grado->id)->get()->all();
        $gradoFuerza= $resGrado[0];
        
        return view('grados.editar', 
                compact('grado', 'fuerzas', 'gradoFuerza'));
    }

    public function update(Request $request, $gradoId)
    {
      
        $grado = Grado::find($gradoId);
        $grado->sigla = $request->sigla;
        $grado->nombre = $request->nombre;
        $grado->fuerza_id = $request->fuerza_id;
        $grado->save();

        return back()->with('flash', 'Grado actualizado con exito');
    }

    public function destroy($gradoId){
        $grado = Grado::find($gradoId);

        $grado->delete();

        return redirect()
            ->route('grado.index')
            ->with('flash', 'Grado eliminado con exito');

    }
}
