<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\FichaPersonal;
use App\Models\Unidad;
use App\Models\EstadoCivil;
use App\Models\Ciudad;
use App\Models\Departamento;
use App\Models\Situacion;
use App\Models\Fuerza;
use App\Models\Grado;
use App\Models\ArmaCuerpo;
use App\Models\Pais;
use App\Models\Clasificacion;
use App\Models\Tema;

class FichasPersonalesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $paises = Pais::all();
        $ciudades = Ciudad::all();
        $departamentos = Departamento::all();
        $estadosCiviles = EstadoCivil::all();
        $situaciones = Situacion::all();
        $fuerzas = Fuerza::all();
        $grados = Grado::all();
        $cuerpos = ArmaCuerpo::all();
        $fichasPer = FichaPersonal::all();
        $temas = Tema::all();
        $clasificaciones = Clasificacion::all();
        return view('fichasPersonales.index',compact('fichasPer',
                                                    'paises', 
                                                    'ciudades',
                                                    'departamentos',
                                                    'estadosCiviles',
                                                    'situaciones',
                                                    'fuerzas',
                                                    'grados',
                                                    'cuerpos',
                                                    'temas',
                                                    'clasificaciones'));
    }

    public function create()
    {
        $unidades = Unidad::all();
        $paises = Pais::all();
        return view('fichasPersonales.crearFicha' ,compact('unidades', 'paises'));
    }

    public function store(Request $request)
    {        
       /* $this->validate($request, [
            'primerNombre' => 'required',
            'primerApellido' => 'required'   
        ]);
        */
        //validacion falta
        $fichaPer = new FichaPersonal();
        $fichaPer->primerNombre = $request->primerNombre;
        $fichaPer->primerApellido = $request->primerApellido;
        $fichaPer->cedula = $request->cedula;
        $fichaPer->otroDocNombre = $request->otroDocNombre;
        $fichaPer->otroDocNumero = $request->otroDocNumero;
        $fichaPer->paisId = $request->paisId;
        $fichaPer->departamentoId = $request->departamentoId;
        $fichaPer->correoElectronico = $request->correoElectronico;
        $fichaPer->sexo = $request->sexo;
        $fichaPer->estadoIngreso = $request->estadoIngreso;
        $fichaPer->numeroPaquete = $request->numeroPaquete;
        $fichaPer->segundoNombre = $request->segundoNombre;
        $fichaPer->segundoApellido = $request->segundoApellido;
        $fichaPer->credencial = $request->credencial;
        $fichaPer->fechaNac = $request->fechaNac;
        $fichaPer->ciudadId = $request->ciudadId;
        $fichaPer->estadoCivilId = $request->estadoCivilId;
        $fichaPer->seccionalPolicial = $request->seccionalPolicial;
        $fichaPer->fechaDef = $request->fechaDef;
        $fichaPer->situacionId = $request->situacionId;
        $fichaPer->fuerzaId = $request->fuerzaId;
        $fichaPer->gradoId = $request->gradoId;
        $fichaPer->cuerpoId = $request->cuerpoId;
        $fichaPer->clasificacionId = $request->clasificacionId;

        $fichaPer->save();
        
        return view('fichasPersonales.editarFicha' ,compact('fichaPer'));
 
        
    }

    public function show($fichaPersonalId)
    {
        //consigo la info basica de la persona
        $fichaPer = FichaPersonal::find($fichaPersonalId);
        //consigo el pais de la persona
        $resPais = Pais::where('id', $fichaPer->id)->get()->all();
        $pais= $resPais[0];
        //consigo las unidades de la persona
        $unidades = Unidad::join('ficha_personal_unidad','unidad_Id','=','unidads.id' )
                        ->select('unidads.nombre')
                        ->where('ficha_Personal_Id', $fichaPer->id)->get()->all();
 
        
        return view('fichasPersonales.verFicha', compact('fichaPer','pais','unidades'));
    }

    public function edit($fichaPersonalId)
    {
        //primero que nada traigo todos los datos genericos.
        $paises = Pais::all();
        $ciudades = Ciudad::all();
        $departamentos = Departamento::all();
        $estadosCiviles = EstadoCivil::all();
        $situaciones = Situacion::all();
        $fuerzas = Fuerza::all();
        $grados = Grado::all();
        $cuerpos = ArmaCuerpo::all();
        $unidades = Unidad::all();
        $clasificaciones = Clasificacion::all();
        //busco la info de la ficha a editar
        $fichaPer = FichaPersonal::find($fichaPersonalId);
       

        //consigo el pais de la persona
        $resPais = Pais::where('id', $fichaPer->id)->get()->all();
        $fichaPais= $resPais[0];
        //consigo el ciudad de la persona
        $resCiudad = Ciudad::where('id', $fichaPer->id)->get()->all();
        $fichaCiudad= $resCiudad[0];
        //consigo departamento de la persona.
        $resDepartamento = Departamento::where('id', $fichaPer->id)->get()->all();
        $fichaDepartamento= $resDepartamento[0];
        //consigo estado civil de la persona.
        $resEstadoCivil = EstadoCivil::where('id', $fichaPer->id)->get()->all();
        $fichaEstadoCivil= $resEstadoCivil[0];
        //consigo fuerza de la persona.
        $resFuerza = Fuerza::where('id', $fichaPer->id)->get()->all();
        $fichaFuerza= $resFuerza[0];
        //consigo grado de la persona.
        $resGrado = Grado::where('id', $fichaPer->id)->get()->all();
        $fichaGrado= $resGrado[0];
        //consigo situacion de la persona.
        $resSituacion = Situacion::where('id', $fichaPer->id)->get()->all();
        $fichaSituacion= $resSituacion[0];
        //consigo cuerpó de la persona.
        $resArmaCuerpo = ArmaCuerpo::where('id', $fichaPer->id)->get()->all();
        $fichaArmaCuerpo= $resArmaCuerpo[0];
        //consigo Clasificacion de la persona.
        $resClasificacion = Clasificacion::where('id', $fichaPer->id)->get()->all();
        $fichaClasificacion = $resClasificacion[0];
        //consigo las unidades de la persona
        $fichaUnidades = Unidad::join('ficha_personal_unidad','unidad_Id','=','unidads.id' )
                        ->select('*')
                        ->where('ficha_Personal_Id', $fichaPer->id)->get()->all();

                        return view('fichasPersonales.editarFicha', 
                                compact('fichaPer',
                                        'paises',
                                        'ciudades',
                                        'departamentos',
                                        'estadosCiviles',
                                        'situaciones',
                                        'fuerzas',
                                        'grados',
                                        'cuerpos',
                                        'unidades',
                                        'fichaPais', 
                                        'fichaCiudad',
                                        'fichaDepartamento',
                                        'fichaEstadoCivil',
                                        'fichaFuerza',
                                        'fichaGrado',
                                        'fichaSituacion',
                                        'fichaArmaCuerpo',
                                        'clasificaciones',
                                        'fichaClasificacion',
                                        'fichaUnidades'  ));

    
    }
    public function update(Request $request, $fichaPersonalId)
    {

        $fichasViejas = Unidad::join('ficha_personal_unidad','unidad_Id','=','unidads.id' )
                        ->select('*')
                        ->where('ficha_Personal_Id', $fichaPersonalId)->get()->all();
                
        $fichaPer = FichaPersonal::find($fichaPersonalId);
        $fichaPer->primerNombre = $request->primerNombre;
        $fichaPer->primerApellido = $request->primerApellido;
        $fichaPer->cedula = $request->cedula;
        $fichaPer->fechaNac = $request->fechaNac;
        $fichaPer->paisId = $request->paisId;
        $fichaPer->save();

       $insertar = collect($fichasViejas)->pluck('unidad_Id');

        //$insertar = array($fichasViejas['unidad_Id']);
        $fichaPer->unidad()->detach($insertar);
        $fichaPer->unidad()->attach($request->get('unidades'));

        //return $insertar;
        return back()->with('flash', 'Ficha actualizada con exito');
        
    }

    public function destroy($fichaPersonalId){
        $fichaPer = FichaPersonal::find($fichaPersonalId);

        $fichaPer->delete();
        $fichaPer->unidad()->detach();

        return redirect()
            ->route('fichasPersonales.index')
            ->with('flash', 'Ficha eliminada con exito');

    }



}