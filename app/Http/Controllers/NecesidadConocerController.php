<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NecesidadConocer;

class NecesidadConocerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $necesidades = NecesidadConocer::all();
        return view('necesidadConocer.index', compact('necesidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $necesidad = new NecesidadConocer();
        $necesidad->nombre = $request->nombre;
        $necesidad->save();
        return redirect()->route('necesidadConocer.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $necesidad = NecesidadConocer::find($id);
        return view('necesidadConocer.editar', compact('necesidad'));
    }

    public function destroy($necesidadId){
        $necesidad = NecesidadConocer::find($necesidadId);

        $necesidad->delete();
        return redirect()
            ->route('necesidadConocer.index')
            ->with('flash', 'Necesidad eliminada con exito');

    }

    public function update(Request $request, $necesidadId){
        $this->validate($request, [
            'nombre' => 'required',
        ]);

        $necesidad = NecesidadConocer::find($necesidadId);
        $necesidad->nombre = $request->nombre;
        $necesidad->save();

        return back()->with('flash', 'Necesidad actualizada con exito');
    }
   
}
