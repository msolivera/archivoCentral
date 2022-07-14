<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parientes;
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




class ParientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($fichaPer)
    {
        $fichaPerTitular = FichaPersonal::find($fichaPer);
        $paises = Pais::all();
        $parentescos = Parentesco::all();
        $ciudades = Ciudad::all();
        $departamentos = Departamento::all();
        $estadosCiviles = EstadoCivil::all();
        $situaciones = Situacion::all();
        $fuerzas = Fuerza::all();
        $grados = Grado::all();
        $cuerpos = ArmaCuerpo::all();
        $fichasParientePer = FichaPersonal::select('*')
        ->whereNotIn('id',function ($query) {
            $query->select("ficha_pariente_id")
            ->from('parientes');
        })
        ->where('id','<>', $fichaPer)
        ->get()->all();

        $temas = Tema::all();
        $clasificaciones = Clasificacion::all();
        $parientes = Parientes::all();
        
        return view('parientes.index',compact('fichasParientePer', 'fichaPerTitular','parientes','paises',
        'ciudades',
        'departamentos',
        'estadosCiviles',
        'situaciones',
        'fuerzas',
        'grados',
        'cuerpos',
        'temas',
        'parentescos',
        'clasificaciones'));
    }

    public function destroy($parienteId){
        $parente = Parientes::find($parienteId);

        $parente->delete();
        return redirect()
            ->route('parientes.index')
            ->with('flash', 'Pariente eliminado con exito');

    }

    public function store(Request $request, $fichaPerId, $fichaPariente)
    {
        
             
        //validacion falta
        /*$pariente = new Parientes();
        $pariente->ficha_personal_id = $fichaPerId;
        $pariente->ficha_pariente_id = $request->ficha_pariente_id;
        $pariente->parentesco_id = $request->parentesco_id;
        $pariente->save();*/

        //return $pariente;

        return $request;

        //return back()->with('flash', 'Pariente creado con exito');        
        
    }
    public function edit($parienteId)
    {
        $pariente = Parientes::find($parienteId);
        return view('parientes.editar', 
        compact('pariente'));

    
    }

    public function update(Request $request, $parienteId)
    {

        $this->validate($request, [
            'nombre' => 'required',
        ]);

        $pariente = Parientes::find($parienteId);
        $pariente->ficha_personal_id = $request->ficha_personal_id;
        $pariente->ficha_pariente_id = $request->ficha_pariente_id;
        $pariente->parentesco_id = $request->parentesco_id;
        $pariente->save();

        return back()->with('flash', 'Pariente actualizado con exito');        
        
    }
}
