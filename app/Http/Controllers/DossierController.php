<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dossier;
use App\Models\Clasificacion;
use App\Models\SerieDocumental;
use App\Models\Ubicacion;
use App\Models\Tema;
use App\Models\DossierObservaciones;
use App\Models\FichaImpersonal;

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
        $serieDocumental = SerieDocumental::all();
        $clasificaciones = Clasificacion::all();
        return view('dossier.index', compact('dossiers', 'clasificaciones', 'ubicaciones', 'serieDocumental'));
    }
    public function show($dossierId)
    {
        $dossier = Dossier::find($dossierId);

        $dossierTemas = Tema::join('dossier_tema', 'tema_Id', '=', 'temas.id')
            ->select('*')
            ->where('dossier_Id', $dossierId)->get()->all();

        $dossierObservaciones = DossierObservaciones::select('*')
            ->where('dossier_Id', $dossier->id)
            ->get()->all();


        return view(
            'dossier.verDossier',
            compact(
                'dossier',
                'dossierTemas',
                'dossierObservaciones'
            )
        );
    }
    public function store(Request $request)
    {
        $dossier = new Dossier();
        $dossier->titulo = $request->titulo;
        $dossier->letra = $request->letra;
        $dossier->resumen = $request->resumen;
        $dossier->fechaInicio = $request->fechaInicio;
        $dossier->fechaFin = $request->fechaFin;
        $dossier->clasificacions_id = $request->clasificacion_id;
        $dossier->ubicacion_id = $request->ubicacion_id;
        $dossier->serie_documental_id = $request->serie_documental_id;
        $dossier->tipo = 'dossier';
        $dossier->save();
        return back()->with('flash', 'Dossier creado con exito');
    }
    public function edit($dossierId)
    {
        $clasificaciones = Clasificacion::all();
        $temas = Tema::all();
        $dossier = Dossier::find($dossierId);
        $ubicaciones = Ubicacion::all();
        $serieDocumental = SerieDocumental::all();

        $fichasPersonalesAgregadas = DB::table('ficha_personal_relacionadas')
            ->select(
                'ficha_personals.id AS fichaPerId',
                'ficha_personal_relacionadas.ficha_personal_id',
                'ficha_personal_relacionadas.id',
                'ficha_personal_relacionadas.tipoRelacion',
                'ficha_personals.cedula',
                'ficha_personals.primerNombre',
                'ficha_personals.segundoNombre',
                'ficha_personals.primerApellido',
                'ficha_personals.segundoApellido'
            )
            ->join('ficha_personals', 'ficha_personal_id', 'ficha_personals.id')
            ->where('ficha_personal_relacionadas.ficha_id', '=', $dossierId)
            ->where('ficha_personal_relacionadas.tipoRelacion', '=', 'dossier')
            ->get();


        $dossierRel = Dossier::select('*')
            ->join('dossier_relacionadas', 'dossier_relacionadas.dossier_id', '=', 'dossiers.id')
            ->where('dossier_relacionadas.ficha_id', $dossierId)
            ->where('dossier_relacionadas.tipoRelacion', '=', 'dossier')
            ->get()->all();

        /*$fichasImpersonalesAgregadas = FichaImpersonal::select('*')
            ->join('ficha_impersonal_relacionadas', 'ficha_impersonal_relacionadas.ficha_impersonal_id', '=', 'ficha_impersonals.id')
            ->where('ficha_impersonal_relacionadas.ficha_id', $dossierId)
            ->where('ficha_impersonal_relacionadas.tipoRelacion', '=', 'dossier')
            ->get()->all();*/
        
        $fichasImpersonalesAgregadas = DB::table('ficha_impersonal_relacionadas')
            ->select(
                'ficha_impersonals.id AS fichaImperId',
                'ficha_impersonal_relacionadas.ficha_impersonal_id',
                'ficha_impersonal_relacionadas.id',
                'ficha_impersonal_relacionadas.tipoRelacion',
                'ficha_impersonals.nombre'
            )
            ->join('ficha_impersonals', 'ficha_impersonal_id', 'ficha_impersonals.id')
            ->where('ficha_impersonal_relacionadas.ficha_id', '=', $dossierId)
            ->where('ficha_impersonal_relacionadas.tipoRelacion', '=', 'dossier')
            ->get();

        $dossierTemas = Tema::join('dossier_tema', 'tema_Id', '=', 'temas.id')
            ->select('*')
            ->where('dossier_Id', $dossier->id)->get()->all();

        $dossierObservaciones = DossierObservaciones::select('*')
            ->where('dossier_Id', $dossier->id)
            ->get()->all();

        return view('dossier.editarDossier', compact(
            'dossier',
            'temas',
            'clasificaciones',
            'dossierTemas',
            'ubicaciones',
            'serieDocumental',
            'dossierObservaciones',
            'fichasImpersonalesAgregadas',
            'fichasPersonalesAgregadas',
            'dossierRel'
        ));

    }

    public function update(Request $request, $dossierId)
    {
        $dossierTemasViejos = Tema::join('dossier_tema', 'tema_Id', '=', 'temas.id')
            ->select('*')
            ->where('dossier_Id', $dossierId)->get()->all();

        $dossier = Dossier::find($dossierId);
        $dossier->titulo = $request->titulo;
        $dossier->letra = $request->letra;
        $dossier->resumen = $request->resumen;
        $dossier->fechaInicio = $request->fechaInicio;
        $dossier->fechaFin = $request->fechaFin;
        $dossier->clasificacions_id = $request->clasificacion_id;
        $dossier->ubicacion_id = $request->ubicacion_id;
        $dossier->serie_documental_id = $request->serie_documental_id;
        $dossier->save();

        $temasInsertar = collect($dossierTemasViejos)->pluck('tema_Id');
        $dossier->tema()->detach($temasInsertar);
        $dossier->tema()->attach($request->get('temas'));

        return back()->with('flash', 'Dossier actualizado con exito');
    }
    public function destroy($dossierId)
    {
        $dossier = Dossier::find($dossierId);
        $dossier->delete();

        return redirect()
            ->route('dossier.index')
            ->with('flash', 'Dossier eliminado con exito');
    }
}
