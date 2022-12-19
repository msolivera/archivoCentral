<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dossier;
use App\Models\Clasificacion;
use App\Models\SerieDocumental;
use App\Models\Ubicacion;

class DossierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dossiers = Dossier::all();
        $ubicaciones = Ubicacion::all();
        $serieDocumental = SerieDocumental ::all();
        $clasificaciones = Clasificacion::all();
        return view('dossier.index', compact('dossiers', 'clasificaciones','ubicaciones', 'serieDocumental'));
    }
    public function show($dossierId)
    {
        $dossier = Dossier::find($dossierId);

        /*$fichasPerRel = DB::table('fichas_impersonales_y_relaciones')
            ->select('*')
            ->where('ficha_impersonal_id', '=', $fichaImpersonalId)
            ->where('tipoRelacion', '=', 'fichaPersonal')
            ->get();

        $fichasImperRel = DB::table('fichas_impersonales_relacionada_a_impersonales')
            ->select('*')
            ->where('ficha_id', '=', $fichaImpersonalId)
            ->where('tipoRelacion', '=', 'fichaImpersonal')
            ->get();*/

        /*$fichaTemas = Tema::join('ficha_impersonal_tema', 'tema_Id', '=', 'temas.id')
            ->select('*')
            ->where('ficha_impersonal_Id', $fichaImpersonal->id)->get()->all();

        $fichaUnidades = Unidad::join('ficha_impersonal_unidad', 'unidad_Id', '=', 'unidads.id')
            ->select('*')
            ->where('ficha_Impersonal_Id', $fichaImpersonal->id)->get()->all();

        $fichasObservaciones = FichaImpersonalObservaciones::select('*')
            ->where('ficha_Impersonal_Id', $fichaImpersonal->id)
            ->get()->all();*/
            
        return view(
            'dossier.verDossier',
            compact(
                'dossier'
            )
        );
    }
    public function store(Request $request)
    {

        $dossier = new Dossier();
        $dossier->titulo = $request->titulo;
        $dossier->letra = $request->titulo;
        $dossier->resumen = $request->resumen;
        $dossier->fechaInicio = $request->fechaInicio;
        $dossier->fechaFin = $request->fechaFin;
        $dossier->clasificacions_id = $request->clasificacion_id;
        $dossier->ubicacion_id = $request->ubicacion_id;
        $dossier->serie_documental_id = $request->serie_documental_id;
        $dossier->save();
//return $dossier;
        return back()->with('flash', 'Dossier creado con exito');
    }
    /*public function edit($fichaImpersonalId)
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
    }*/
    /*
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
    }*/
    /*public function destroy($fichaImpersonalId)
    {
        $fichaImpersonal = fichaImpersonal::find($fichaImpersonalId);
        $fichaImpersonal->delete();
        $fichaImpersonal->unidad()->detach();
        $fichaImpersonal->tema()->detach();

        return redirect()
            ->route('fichaImpersonal.index')
            ->with('flash', 'Ficha Impersonal eliminada con exito');
    }*/
}
