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

                $fichasImperRel = DB::table('ficha_impersonals')
                    ->select('ficha_impersonals.id', 'ficha_impersonals.nombre', 'clasificacion_id', 'clasificacions.nombre AS clasificacionNombre')
                    ->join('clasificacions', 'ficha_impersonals.id', '=', 'clasificacions.id')
                    ->whereNotIn('ficha_impersonals.id', DB::table('ficha_impersonal_relacionadas')->select('ficha_impersonal_id')
                        ->where('ficha_impersonal_relacionadas.ficha_id', '=', $fichaId)
                        ->where('ficha_impersonal_relacionadas.tipoRelacion', '=', 'fichaPersonal'))
                    ->get();
                $temas = Tema::all();
                $clasificaciones = Clasificacion::all();

                return view('fichaImpersonalRelacionada.index', compact(
                    'fichasImperRel',
                    'fichaTitular',

                    'temas',
                    'clasificaciones'
                ));
                break;
            case ('dossier'):
                $fichaTitular = Dossier::find($fichaId);

                $fichasImperRel = DB::table('ficha_impersonals')
                    ->select('ficha_impersonals.id', 'ficha_impersonals.nombre', 'clasificacion_id', 'clasificacions.nombre AS clasificacionNombre')
                    ->join('clasificacions', 'ficha_impersonals.id', '=', 'clasificacions.id')
                    ->whereNotIn('ficha_impersonals.id', DB::table('ficha_impersonal_relacionadas')->select('ficha_impersonal_id')
                        ->where('ficha_impersonal_relacionadas.ficha_id', '=', $fichaId)
                        ->where('ficha_impersonal_relacionadas.tipoRelacion', '=', 'fichaPersonal'))
                    ->get();
                $temas = Tema::all();
                $clasificaciones = Clasificacion::all();

                return view('fichaImpersonalRelacionada.index', compact(
                    'fichasImperRel',
                    'fichaTitular',

                    'temas',
                    'clasificaciones'
                ));
                break;
            case ('fichaImpersonal'):
                $fichaTitular = FichaImpersonal::find($fichaId);

                $fichasImperRel = DB::table('ficha_impersonals')
                    ->select('ficha_impersonals.id', 'ficha_impersonals.nombre', 'clasificacion_id', 'clasificacions.nombre AS clasificacionNombre')
                    ->join('clasificacions', 'ficha_impersonals.id', '=', 'clasificacions.id')
                    ->where('ficha_impersonals.id', '<>', $fichaId)
                    ->whereNotIn('ficha_impersonals.id', DB::table('ficha_impersonal_relacionadas')->select('ficha_impersonal_id')
                        ->where('ficha_impersonal_relacionadas.ficha_id', '=', $fichaId)
                        ->where('ficha_impersonal_relacionadas.tipoRelacion', '=', 'fichaImpersonal'))
                    ->get();
                $temas = Tema::all();
                $clasificaciones = Clasificacion::all();
                $fichasRelacionadas = FichaPersonalRelacionada::all();

                return view('dossierRelacionada.index', compact(
                    'fichasImperRel',
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
