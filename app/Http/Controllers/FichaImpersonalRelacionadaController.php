<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FichaPersonalRelacionada;
use App\Models\FichaImpersonalRelacionada;
use App\Models\FichaPersonal;
use App\Models\FichaImpersonal;
use App\Models\Dossier;
use App\Models\Tema;
use App\Models\Clasificacion;
use Illuminate\Support\Facades\DB;

class FichaImpersonalRelacionadaController extends Controller
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
                    ->join('clasificacions', 'ficha_impersonals.clasificacion_id', '=', 'clasificacions.id')
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
                        ->where('ficha_impersonal_relacionadas.tipoRelacion', '=', 'dossier'))
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
                /* $fichasImperRel = DB::table('ficha_impersonals')
                    ->select('ficha_impersonals.id', 'ficha_impersonals.nombre', 'clasificacion_id', 'clasificacions.nombre AS clasificacionNombre')
                    ->join('clasificacions', 'ficha_impersonals.id', '=', 'clasificacions.id')
                    ->where('ficha_impersonals.id', '<>', $fichaId)
                    ->whereNotIn('ficha_impersonals.id', DB::table('ficha_impersonal_relacionadas')->select('ficha_impersonal_id')
                        ->where('ficha_impersonal_relacionadas.ficha_id', '=', $fichaId)
                        ->where('ficha_impersonal_relacionadas.tipoRelacion', '=', 'fichaImpersonal'))
                    ->get(); */

                /* select * from ficha_impersonals
join clasificacions on ficha_impersonals.clasificacion_id = clasificacions.id
where ficha_impersonals.id <> '1'
and ficha_impersonals.id 
not in (select ficha_impersonal_id from ficha_impersonal_relacionadas 
where ficha_id = '1' and ficha_impersonal_relacionadas.tipoRelacion= 'fichaImpersonal') */

$fichasImperRel  = DB::table('ficha_impersonals')
->select('ficha_impersonals.id', 'ficha_impersonals.nombre', 'clasificacion_id', 'clasificacions.nombre AS clasificacionNombre')
->join('clasificacions', 'ficha_impersonals.clasificacion_id', '=', 'clasificacions.id')
->where('ficha_impersonals.id', '<>', $fichaId)
->whereNotIn('ficha_impersonals.id', DB::table('ficha_impersonal_relacionadas')->select('ficha_impersonal_id')
->where('ficha_impersonal_relacionadas.ficha_id', '=', $fichaId)
->where('ficha_impersonal_relacionadas.tipoRelacion', '=', 'fichaImpersonal'))
->get();


                $temas = Tema::all();
                $clasificaciones = Clasificacion::all();
                $fichasRelacionadas = FichaPersonalRelacionada::all();

                return view('fichaImpersonalRelacionada.index', compact(
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
        $fichaRelacion = FichaImpersonalRelacionada::find($fichaRelId);
        $fichaRelacion->delete();

        return back()->with('flash', 'Registro eliminado con exito');
    }

    public function store(Request $request,  $fichaTitular, $fichaTipo)
    {

        $fichaRelacionada = new FichaImpersonalRelacionada();
        $fichaRelacionada->ficha_id = $fichaTitular;
        $fichaRelacionada->ficha_impersonal_id = $request->ficha_Id;
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

        $fichaRelacionada = FichaImpersonalRelacionada::find($fichaId);
        $fichaRelacionada->ficha_impersonal_id = $request->ficha_impersonal_id;
        $fichaRelacionada->ficha_per_relacionada_id = $request->ficha_imper_relacionada_id;
        $fichaRelacionada->save();

        return back()->with('flash', 'Ficha actualizada con exito');
    }
}
