<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SerieDocumental;

class SerieDocumentalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index ()
    {
        $series = SerieDocumental::all();
        return view('serieDocumental.index', compact('series'));
    }
    public function destroy($serieId)
    {
        $serie = SerieDocumental::find($serieId);
        $serie->delete();
        return redirect()
            ->route('serieDocumental.index')
            ->with('flash', 'Serie eliminada con exito');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
        ]);
        $serie = new SerieDocumental();
        $serie->nombre = $request->nombre;
        $serie->save();
        return back()->with('flash', 'Serie creada con exito');
    }
    public function edit($serieId)
    {
        $serie = SerieDocumental::find($serieId);
        return view('serieDocumental.editar', compact('serie'));
    }
    public function update(Request $request, $serieId)
    {
        $this->validate($request, [
            'nombre' => 'required',
        ]);
        $serie = SerieDocumental::find($serieId);
        $serie->nombre = $request->nombre;
        $serie->save();
        return back()->with('flash', 'Serie actualizada con exito');
    }
}
