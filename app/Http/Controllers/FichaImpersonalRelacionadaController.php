<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FichaPersonalRelacionada;
use App\Models\FichaImpersonalRelacionada;
use App\Models\FichaPersonal;
use App\Models\FichaImpersonal;
use App\Models\Tema;
use App\Models\Clasificacion;

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
                $fichaTitular = FichaImpersonal::find($fichaId);
                $fichasImperRel = FichaImpersonal::select('*')
                    ->from('ficha_impersonals')
                    ->where('id', '<>', $fichaId)->get()->all();

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
            case ('fichaImpersonal'):
                $fichaTitular = FichaImpersonal::find($fichaId);
                $fichasImperRel = FichaPersonal::select('*')
                    ->from('ficha_impersonals')
                    ->where('id', '<>', $fichaId)->get()->all();

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
        /*$fichaRelacionada = FichaImpersonalRelacionada::find($fichaId);
        return view(
            'parientes.editar',
            compact('pariente')
        );*/
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
