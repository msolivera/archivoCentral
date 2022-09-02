<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FichaPersonalRelacionada;
use App\Models\Pais;
use App\Models\Ciudad;
use App\Models\Departamento;
use App\Models\EstadoCivil;
use App\Models\Situacion;
use App\Models\Fuerza;
use App\Models\Grado;
use App\Models\ArmaCuerpo;
use App\Models\FichaPersonal;
use App\Models\Tema;
use App\Models\Clasificacion;
use App\Models\Parentesco;

class FichaPersonalRelacionadaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($fichaId, string $tipaso)
    {
        return $tipaso;
        /*switch ($tipo) {
            case ('fichaPer'):
                $fichaPerTitular = FichaPersonal::find($fichaId);
                $paises = Pais::all();
                $parentescos = Parentesco::all();
                $ciudades = Ciudad::all();
                $departamentos = Departamento::all();
                $estadosCiviles = EstadoCivil::all();
                $situaciones = Situacion::all();
                $fuerzas = Fuerza::all();
                $grados = Grado::all();
                $cuerpos = ArmaCuerpo::all();
                $fichasPerRel = FichaPersonal::select('*')
                    ->whereNotIn('id', function ($query) {
                        $query->select("ficha_per_relacionada_id")
                            ->from('ficha_personal_relacionadas');
                    })
                    ->where('id', '<>', $fichaId)
                    ->get()->all();

                $temas = Tema::all();
                $clasificaciones = Clasificacion::all();
                $fichasRelacionadas = FichaPersonalRelacionada::all();

                return view('fichaPersonalRelacionada.index', compact(
                    'fichasPerRel',
                    'fichaPerTitular',
                    'fichasRelacionadas',
                    'paises',
                    'ciudades',
                    'departamentos',
                    'estadosCiviles',
                    'situaciones',
                    'fuerzas',
                    'grados',
                    'cuerpos',
                    'temas',
                    'parentescos',
                    'clasificaciones',
                    'tipo'
                ));
        }*/
    }

    public function destroy($fichaRelId)
    {
        $fichasRelacionadas = FichaPersonalRelacionada::select("*")
            ->where("ficha_per_relacionada_id", "=", $fichaRelId)->get()->all();
        $fichaFila = $fichasRelacionadas[0];
        $fichaFila->delete();
        return back()->with('flash', 'Pariente eliminado con exito');
    }

    public function store(Request $request,  $fichaTitular, $tipoInsert)
    {

        switch ($tipoInsert) {
        }
        $fichaRelacionada = new FichaPersonalRelacionada();
        $fichaRelacionada->ficha_personal_id = $fichaTitular;
        $fichaRelacionada->ficha_per_relacionada_id = $request->pariente_Id;
        $fichaRelacionada->parentesco_id = $request->parentesco_id;
        $fichaRelacionada->save();

        return back()->with('flash', 'Pariente creado con exito');
    }
    public function edit($fichaId)
    {
        $fichaRelacionada = FichaPersonalRelacionada::find($fichaId);
        return view(
            'parientes.editar',
            compact('pariente')
        );
    }

    public function update(Request $request, $fichaId)
    {

        $this->validate($request, [
            'nombre' => 'required',
        ]);

        $fichaRelacionada = FichaPersonalRelacionada::find($fichaId);
        $fichaRelacionada->ficha_personal_id = $request->ficha_personal_id;
        $fichaRelacionada->ficha_per_relacionada_id = $request->ficha_per_relacionada_id;
        $fichaRelacionada->parentesco_id = $request->parentesco_id;
        $fichaRelacionada->save();

        return back()->with('flash', 'Pariente actualizado con exito');
    }
}
