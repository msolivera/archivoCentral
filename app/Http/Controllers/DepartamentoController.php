<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;

class DepartamentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $departamentos = Departamento::all();
        return view('departamentos.index',compact('departamentos'));
    }

    public function destroy($departamentoId){
        $departamento = Departamento::find($departamentoId);

        $departamento->delete();
        return redirect()
            ->route('departamentos.index')
            ->with('flash', 'Departamento eliminado con exito');

    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'nombre' => 'required', 
        ]);
        
        //validacion falta
        $departamento = new Departamento();
        $departamento->nombre = $request->nombre;
        $departamento->save();

        return back()->with('flash', 'Departamento creado con exito');        
        
    }
    public function edit($departamentoId)
    {
        $departamento = Departamento::find($departamentoId);
        return view('departamentos.editar', 
        compact('departamento'));

    
    }

    public function update(Request $request, $departamentoId)
    {

        $this->validate($request, [
            'nombre' => 'required',
        ]);

        $departamento = Departamento::find($departamentoId);
        $departamento->nombre = $request->nombre;
        $departamento->save();

        return back()->with('flash', 'Departamento actualizado con exito');        
        
    }
}
