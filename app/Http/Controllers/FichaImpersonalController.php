<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FichaImpersonal;
use App\Models\Clasificacion;
use App\Models\Tema;
use App\Models\Unidad;
use App\Models\FichaImpersonalObservaciones;

class FichaImpersonalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $clasificaciones = Clasificacion::all();
        $fichasImper = FichaImpersonal::all();
        return view('fichasImpersonales.index', compact('fichasImper', 'clasificaciones'));
    }
    public function show($fichaImpersonalId)
    {
        $fichaImpersonal = fichaImpersonal::find($fichaImpersonalId);

        $fichasPerRel = DB::table('fichas_impersonales_y_relaciones')
            ->select('*')
            ->where('ficha_impersonal_id', '=', $fichaImpersonalId)
            ->where('tipoRelacion', '=', 'fichaPersonal')
            ->get();

        $fichasImperRel = DB::table('fichas_impersonales_relacionada_a_impersonales')
            ->select('*')
            ->where('ficha_id', '=', $fichaImpersonalId)
            ->where('tipoRelacion', '=', 'fichaImpersonal')
            ->get();

        $fichaTemas = Tema::join('ficha_impersonal_tema', 'tema_Id', '=', 'temas.id')
            ->select('*')
            ->where('ficha_impersonal_Id', $fichaImpersonal->id)->get()->all();

        $fichaUnidades = Unidad::join('ficha_impersonal_unidad', 'unidad_Id', '=', 'unidads.id')
            ->select('*')
            ->where('ficha_Impersonal_Id', $fichaImpersonal->id)->get()->all();

        $fichasObservaciones = FichaImpersonalObservaciones::select('*')
            ->where('ficha_Impersonal_Id', $fichaImpersonal->id)
            ->get()->all();

        return view(
            'fichasImpersonales.verFicha',
            compact(
                'fichaImpersonal',
                'fichasPerRel',
                'fichasImperRel',
                'fichaTemas',
                'fichaUnidades',
                'fichasObservaciones'
            )
        );
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'nombre' => 'required',
            'clasificacion_id' => 'required',
        ]);

        //validacion falta
        $fichaImpersonal = new fichaImpersonal();
        $fichaImpersonal->nombre = $request->nombre;
        $fichaImpersonal->tipo = 'fichaImpersonal';
        $fichaImpersonal->clasificacion_id = $request->clasificacion_id;
        $fichaImpersonal->save();

        return back()->with('flash', 'Ficha Impersonal creada con exito');
    }
    public function edit($fichaImpersonalId)
    {
        $clasificaciones = Clasificacion::all();
        $unidades = Unidad::all();
        $temas = Tema::all();
        $fichaImpersonal = fichaImpersonal::find($fichaImpersonalId);
        $fichasPerRel = DB::table('fichas_impersonales_y_relaciones')
            ->select('*')
            ->where('ficha_impersonal_id', '=', $fichaImpersonalId)
            ->where('tipoRelacion', '=', 'fichaPersonal')
            ->get();

        //arreglar esto usar vistas
        $fichasImpersonalesAgregadas = FichaImpersonal::select('*')
            ->join('ficha_impersonal_relacionadas', 'ficha_impersonal_relacionadas.ficha_impersonal_id', '=', 'ficha_impersonals.id')
            ->where('ficha_impersonal_relacionadas.ficha_id', $fichaImpersonalId)
            ->where('ficha_impersonal_relacionadas.tipoRelacion', '=', 'fichaImpersonal')
            ->get()->all();

        $fichaTemas = Tema::join('ficha_impersonal_tema', 'tema_Id', '=', 'temas.id')
            ->select('*')
            ->where('ficha_impersonal_Id', $fichaImpersonal->id)->get()->all();

        $fichaUnidades = Unidad::join('ficha_impersonal_unidad', 'unidad_Id', '=', 'unidads.id')
            ->select('*')
            ->where('ficha_Impersonal_Id', $fichaImpersonal->id)->get()->all();

        $fichasObservaciones = FichaImpersonalObservaciones::select('*')
            ->where('ficha_Impersonal_Id', $fichaImpersonal->id)
            ->get()->all();

        return view('fichasImpersonales.editarFicha', compact('fichaImpersonal', 'temas', 'unidades', 'clasificaciones', 'fichaTemas', 'fichaUnidades', 'fichasPerRel', 'fichasImpersonalesAgregadas', 'fichasObservaciones'));
    }
    public function update(Request $request, $fichaImpersonalId)
    {
        $this->validate($request, [
            'nombre' => 'required',
            //'clasificacion_id' => 'required', 
        ]);

        $fichasUniViejas = Unidad::join('ficha_impersonal_unidad', 'unidad_Id', '=', 'unidads.id')
            ->select('*')
            ->where('ficha_impersonal_Id', $fichaImpersonalId)->get()->all();
        $fichasTemasViejos = Tema::join('ficha_impersonal_tema', 'tema_Id', '=', 'temas.id')
            ->select('*')
            ->where('ficha_impersonal_Id', $fichaImpersonalId)->get()->all();

        $fichaImpersonal = fichaImpersonal::find($fichaImpersonalId);
        $fichaImpersonal->nombre = $request->nombre;
        $fichaImpersonal->clasificacion_id = $request->clasificacion_id;
        $fichaImpersonal->save();
        $unidadesInsertar = collect($fichasUniViejas)->pluck('unidad_Id');
        $temasInsertar = collect($fichasTemasViejos)->pluck('tema_Id');

        //esto para actualizar la informacio de las unidades de la ficha
        $fichaImpersonal->unidad()->detach($unidadesInsertar);
        $fichaImpersonal->unidad()->attach($request->get('unidades'));
        $fichaImpersonal->tema()->detach($temasInsertar);
        $fichaImpersonal->tema()->attach($request->get('temas'));


        return back()->with('flash', 'Ficha Impersonal actualizada con exito');
    }
    public function destroy($fichaImpersonalId)
    {
        $fichaImpersonal = fichaImpersonal::find($fichaImpersonalId);
        $fichaImpersonal->delete();
        $fichaImpersonal->unidad()->detach();
        $fichaImpersonal->tema()->detach();

        return redirect()
            ->route('fichaImpersonal.index')
            ->with('flash', 'Ficha Impersonal eliminada con exito');
    }
}
