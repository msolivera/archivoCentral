<?php

namespace App\Http\Controllers;

use App\Models\Clasificacion;
use App\Models\Dossier;
use App\Models\DossierRelacionada;
use App\Models\FichaImpersonal;
use App\Models\FichaPersonal;
use App\Models\FichaPersonalRelacionada;
use App\Models\Tema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DossierRelacionadaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($fichaId, $fichaTipo)
    {

        switch ($fichaTipo) {

            case ('fichaPersonal'):
                $fichaTitular = FichaPersonal::find($fichaId);

                $dossierRel = DB::table('dossiers')
                    ->select('dossiers.id', 'dossiers.titulo','ubicacion_id', 'clasificacions_id', 'clasificacions.nombre AS clasificacionNombre')
                    ->join('clasificacions', 'dossiers.id', '=', 'clasificacions.id')
                    ->whereNotIn('dossiers.id', DB::table('dossier_relacionadas')->select('dossier_id')
                        ->where('dossier_relacionadas.ficha_id', '=', $fichaId)
                        ->where('dossier_relacionadas.tipoRelacion', '=', 'fichaPersonal'))
                    ->get();
                $temas = Tema::all();
                $clasificaciones = Clasificacion::all();

                return view('fichaImpersonalRelacionada.index', compact(
                    'dossierRel',
                    'fichaTitular',
                    'temas',
                    'clasificaciones'
                ));
                break;
            case ('dossier'):
                $fichaTitular = Dossier::find($fichaId);

                $dossierRel = DB::table('dossiers')
                    ->select('dossiers.id', 'dossiers.titulo', 'clasificacions_id', 'clasificacions.nombre AS clasificacionNombre')
                    ->join('clasificacions', 'dossiers.id', '=', 'clasificacions.id')
                    ->whereNotIn('dossiers.id', DB::table('dossier_relacionadas')->select('dossier_id')
                        ->where('dossier_relacionadas.ficha_id', '=', $fichaId)
                        ->where('dossier_relacionadas.tipoRelacion', '=', 'dossier'))
                    ->get();
                $temas = Tema::all();
                $clasificaciones = Clasificacion::all();

                return view('fichaImpersonalRelacionada.index', compact(
                    'dossierRel',
                    'fichaTitular',

                    'temas',
                    'clasificaciones'
                ));
                break;
            case ('fichaImpersonal'):
                $fichaTitular = FichaImpersonal::find($fichaId);

                $dossierRel = DB::table('dossiers')
                    ->select('dossiers.id', 'dossiers.titulo','ubicacion_id', 'clasificacions_id', 'clasificacions.nombre AS clasificacionNombre')
                    ->join('clasificacions', 'dossiers.id', '=', 'clasificacions.id')
                    ->whereNotIn('dossiers.id', DB::table('dossier_relacionadas')->select('dossier_id')
                        ->where('dossier_relacionadas.ficha_id', '=', $fichaId)
                        ->where('dossier_relacionadas.tipoRelacion', '=', 'fichaImpersonal'))
                    ->get();
                $temas = Tema::all();
                $clasificaciones = Clasificacion::all();
                $fichasRelacionadas = FichaPersonalRelacionada::all();

                return view('dossierRelacionada.index', compact(
                    'dossierRel',
                    'fichaTitular',
                    'fichasRelacionadas',
                    'temas',
                    'clasificaciones'
                ));
                break;
            default:
                return $fichaTipo;
        }
        return $fichaTipo;
    }

    public function destroy($fichaRelId)
    {
        $fichaRelacion = DossierRelacionada::find($fichaRelId);
        $fichaRelacion->delete();

        return back()->with('flash', 'Registro eliminado con exito');
    }

    public function store(Request $request,  $fichaTitular, $fichaTipo)
    {

        $fichaRelacionada = new DossierRelacionada();
        $fichaRelacionada->ficha_id = $fichaTitular;
        $fichaRelacionada->dossier_id = $request->dossier_Id;
        $fichaRelacionada->tipoRelacion = $fichaTipo;
        $fichaRelacionada->save();

        return back()->with('flash', 'Relacion creada con exito');
    }
    public function edit($fichaId)
    {

    }

    public function update(Request $request, $fichaId)
    {

        $this->validate($request, [
            'nombre' => 'required',
        ]);

        $fichaRelacionada = DossierRelacionada::find($fichaId);
        $fichaRelacionada->ficha_impersonal_id = $request->ficha_impersonal_id;
        $fichaRelacionada->ficha_per_relacionada_id = $request->ficha_imper_relacionada_id;
        $fichaRelacionada->save();

        return back()->with('flash', 'Ficha actualizada con exito');
    }
}
