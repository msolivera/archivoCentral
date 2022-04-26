<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Situacion;

class SituacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $situaciones = Situacion::all();
        return view('situacion.index', compact('situaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('situacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $situacion = new Situacion();
        $situacion->nombre = $request->nombre;
        $situacion->save();
        return redirect()->route('situacion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $situacion = Situacion::find($id);
        return view('situacion.editar', compact('situacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $situacion = Situacion::find($id);
        $situacion->nombre = $request->nombre;
        $situacion->save();
        
        return back()->with('flash', 'Situacion actualizada con exito');
    }
    public function destroy($id)
    {
        $situacion = Situacion::find($id);
        $situacion->delete();
        return back()->with('flash', 'Situacion eliminada con exito');
    }
}
