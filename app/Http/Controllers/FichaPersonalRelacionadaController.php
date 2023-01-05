<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
use App\Models\FichaImpersonal;
use App\Models\Tema;
use App\Models\Clasificacion;
use App\Models\Dossier;
use App\Models\Parentesco;

class FichaPersonalRelacionadaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($fichaId, $fichaTipo)
    {

        switch ($fichaTipo) {
            case ('fichaPersonal'):
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

                $fichasPerRel = DB::table('ficha_personals')
                    ->select('ficha_personals.id', 'ficha_personals.cedula', 'ficha_personals.primerNombre', 'ficha_personals.segundoNombre', 'ficha_personals.primerApellido', 'ficha_personals.segundoApellido')
                    ->where('ficha_personals.id', '<>', $fichaId)
                    ->whereNotIn('ficha_personals.id', DB::table('ficha_personal_relacionadas')->select('ficha_personal_id')
                        ->where('ficha_personal_relacionadas.ficha_id', '=', $fichaId)
                        ->where('ficha_personal_relacionadas.tipoRelacion', '=', 'fichaPersonal'))
                    ->get();

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
                    'clasificaciones'
                ));
                break;
            case ('fichaImpersonal'):
                $fichaPerTitular = FichaImpersonal::find($fichaId);
                $paises = Pais::all();
                $parentescos = Parentesco::all();
                $ciudades = Ciudad::all();
                $departamentos = Departamento::all();
                $estadosCiviles = EstadoCivil::all();
                $situaciones = Situacion::all();
                $fuerzas = Fuerza::all();
                $grados = Grado::all();
                $cuerpos = ArmaCuerpo::all();


                $fichasPerRel = DB::table('ficha_personals')
                    ->select('ficha_personals.id', 'ficha_personals.cedula', 'ficha_personals.primerNombre', 'ficha_personals.segundoNombre', 'ficha_personals.primerApellido', 'ficha_personals.segundoApellido')
                    ->whereNotIn('ficha_personals.id', DB::table('ficha_personal_relacionadas')->select('ficha_personal_id')
                        ->where('ficha_personal_relacionadas.ficha_id', '=', $fichaId)
                        ->where('ficha_personal_relacionadas.tipoRelacion', '=', 'fichaImpersonal'))
                    ->get();


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
                    'clasificaciones'
                ));
                break;
            case ('dossier'):
                $fichaPerTitular = Dossier::find($fichaId);
                $paises = Pais::all();
                $parentescos = Parentesco::all();
                $ciudades = Ciudad::all();
                $departamentos = Departamento::all();
                $estadosCiviles = EstadoCivil::all();
                $situaciones = Situacion::all();
                $fuerzas = Fuerza::all();
                $grados = Grado::all();
                $cuerpos = ArmaCuerpo::all();


                $fichasPerRel = DB::table('ficha_personals')
                    ->select('ficha_personals.id', 'ficha_personals.cedula', 'ficha_personals.primerNombre', 'ficha_personals.segundoNombre', 'ficha_personals.primerApellido', 'ficha_personals.segundoApellido')
                    ->whereNotIn('ficha_personals.id', DB::table('ficha_personal_relacionadas')->select('ficha_personal_id')
                        ->where('ficha_personal_relacionadas.ficha_id', '=', $fichaId)
                        ->where('ficha_personal_relacionadas.tipoRelacion', '=', 'dossier'))
                    ->get();


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
        $fichaRelacion = FichaPersonalRelacionada::find($fichaRelId);
        $fichaRelacion->delete();

        return back()->with('flash', 'Registro eliminado con exito');
    }

    public function store(Request $request,  $fichaTitular, $fichaTipo)
    {

        $fichaRelacionada = new FichaPersonalRelacionada();
        $fichaRelacionada->ficha_id = $fichaTitular;
        $fichaRelacionada->ficha_personal_id = $request->ficha_Id;
        $fichaRelacionada->tipoRelacion = $fichaTipo;
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
