<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Ciudad;

class CiudadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

        $ciudades = Ciudad::all();
        return view('ciudades.index',compact('ciudades'));

    }

    public function create()
    {
        $departamentos = Departamento::all();
        return view('ciudades.crear' ,compact('departamentos'));
    }

    public function store(Request $request)
    {

        
        $ciudad = new Ciudad();
        $ciudad->nombre = $request->nombre;
        $ciudad->departamento_id = $request->departamento_id;
        $ciudad->save();

        return back()->with('flash', 'Ciudad creada con exito');        
        
    }


    public function edit($ciudadId)
    {
        $ciudad = Ciudad::find($ciudadId);
        $departamentos = Departamento::all();


        $resCiudad = Departamento::where('id', $ciudad->id)->get()->all();
        $ciudadDepa = $resCiudad[0];
     
       return view('ciudades.editar', 
                compact('ciudad', 'departamentos', 'ciudadDepa'));
    }

    public function update(Request $request, $ciudadId)
    {
      
        $ciudad = Ciudad::find($ciudadId);
        $ciudad->nombre = $request->nombre;
        $ciudad->departamento_id = $request->departamento_id;
        $ciudad->save();

        return back()->with('flash', 'Ciudad actualizada con exito');
    }

    public function destroy($ciudadId){

        $ciudad = Ciudad::find($ciudadId);
        $ciudad->delete();

        return redirect()
            ->route('ciudad.index')
            ->with('flash', 'Ciudad eliminada con exito');

    }
}
