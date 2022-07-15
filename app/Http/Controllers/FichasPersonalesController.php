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
use App\Models\Ideologia;
use App\Models\Profesion;
use App\Models\Domicilio;
use App\Models\Estudio;
use App\Models\FichaPersonalIdeologia;
use App\Models\FichaPersonalProfesion;
use App\Models\RolOrganizacion;
use App\Models\Organizacion;
use App\Models\TipoAnotacion;
use App\Models\Anotacion;
use App\Models\Parientes;
use App\Models\Parentesco;


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

    //funcion que se ejecuta cuando abro el menu de ver todas la fichas personales
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


        return view('fichasPersonales.index', compact(
            'fichasPer',
            'paises',
            'ciudades',
            'departamentos',
            'estadosCiviles',
            'situaciones',
            'fuerzas',
            'grados',
            'cuerpos',
            'temas',
            'clasificaciones'
        ));
    }

    //funcion que se ejecuta cuando quiero ver toda la informacion de una sola ficha
    public function show($fichaPersonalId)
    {
        //consigo la info basica de la persona
        $fichaPer = FichaPersonal::find($fichaPersonalId);
        //consigo las unidades de la persona
        $fichaUnidades = Unidad::join('ficha_personal_unidad', 'unidad_Id', '=', 'unidads.id')
            ->select('*')
            ->where('ficha_Personal_Id', $fichaPer->id)->get()->all();

        //consigo LOS TEMAS de la persona
        $fichaTemas = Tema::join('ficha_personal_tema', 'tema_Id', '=', 'temas.id')
            ->select('*')
            ->where('ficha_Personal_Id', $fichaPer->id)->get()->all();

        //obtengo las ideologias de la ficha
        $fichasIdeologias = FichaPersonalIdeologia::select('*')
            ->where('fichaPersonal_id', $fichaPer->id)
            ->get()->all();
        $fichasProfesiones = FichaPersonalProfesion::select('*')
            ->where('fichaPersonal_id', $fichaPer->id)
            ->get()->all();
        $fichasOrganizaciones = RolOrganizacion::select('*')
            ->where('ficha_Personal_id', $fichaPer->id)
            ->get()->all();
        $fichasAnotaciones = Anotacion::select('*')
            ->where('ficha_Personal_id', $fichaPer->id)
            ->get()->all();

        $fichasDomicilios = Domicilio::select('*')
            ->where('ficha_Personal_id', $fichaPer->id)
            ->get()->all();

        $fichasEstudios = Estudio::select('*')
            ->where('fichaPersonal_Id', $fichaPer->id)
            ->get()->all();


        return view('fichasPersonales.verFicha', compact(
            'fichaPer',
            'fichaUnidades',
            'fichasIdeologias',
            'fichaTemas',
            'fichasProfesiones',
            'fichasOrganizaciones',
            'fichasAnotaciones',
            'fichasDomicilios',
            'fichasEstudios'
        ));
    }

    //funcion que se ejecuta cuando creo una nueva ficha y se redirecciona a la vista de editar
    public function store(Request $request)
    {

        $paises = Pais::all();
        $ciudades = Ciudad::all();
        $departamentos = Departamento::all();
        $estadosCiviles = EstadoCivil::all();
        $situaciones = Situacion::all();
        $fuerzas = Fuerza::all();
        $grados = Grado::all();
        $cuerpos = ArmaCuerpo::all();
        $unidades = Unidad::all();
        $temas = Tema::all();
        $ideologias = Ideologia::all();
        $profesiones = Profesion::all();
        $organizaciones = Organizacion::all();
        $clasificaciones = Clasificacion::all();
        $tipoAnotaciones = TipoAnotacion::all();
        $parentescos = Parentesco::all();


        //validacion falta
        $fichaPer = new FichaPersonal();
        $fichaPer->primerNombre = $request->primerNombre;
        $fichaPer->primerApellido = $request->primerApellido;
        $fichaPer->cedula = $request->cedula;
        $fichaPer->otroDocNombre = $request->otroDocNombre;
        $fichaPer->otroDocNumero = $request->otroDocNumero;
        $fichaPer->pais_id = $request->pais_id;
        $fichaPer->departamentos_id = $request->departamentos_id;
        $fichaPer->correoElectronico = $request->correoElectronico;
        $fichaPer->sexo = $request->sexo;
        $fichaPer->estadoIngreso = $request->estadoIngreso;
        $fichaPer->numeroPaquete = $request->numeroPaquete;
        $fichaPer->segundoNombre = $request->segundoNombre;
        $fichaPer->segundoApellido = $request->segundoApellido;
        $fichaPer->credencial = $request->credencial;
        $fichaPer->fechaNac = $request->fechaNac;
        $fichaPer->ciudad_id = $request->ciudad_id;
        $fichaPer->estadoCivil_id = $request->estadoCivil_id;
        $fichaPer->seccionalPolicial = $request->seccionalPolicial;
        $fichaPer->fechaDef = $request->fechaDef;
        $fichaPer->situacion_id = $request->situacion_id;
        $fichaPer->fuerza_id = $request->fuerza_id;
        $fichaPer->grado_id = $request->grado_id;
        $fichaPer->cuerpo_id = $request->cuerpo_id;
        $fichaPer->clasificacion_id = $request->clasificacion_id;

        //return $fichaPer; 
        $fichaPer->save();

        $fichasPerParientes = FichaPersonal::select('*')
            ->where('id', '<>', $fichaPer->id)
            ->get()->all();

        //consigo las unidades de la persona
        $fichaUnidades = Unidad::join('ficha_personal_unidad', 'unidad_Id', '=', 'unidads.id')
            ->select('*')
            ->where('ficha_Personal_Id', $fichaPer->id)->get()->all();
        //consigo LOS TEMAS de la persona
        $fichaTemas = Tema::join('ficha_personal_tema', 'tema_Id', '=', 'temas.id')
            ->select('*')
            ->where('ficha_Personal_Id', $fichaPer->id)->get()->all();

        //obtengo las ideologias de la ficha
        $fichasIdeologias = FichaPersonalIdeologia::select('*')
            ->where('fichaPersonal_id', $fichaPer->id)
            ->get()->all();

        $fichasProfesiones = FichaPersonalProfesion::select('*')
            ->where('fichaPersonal_id', $fichaPer->id)
            ->get()->all();

        $fichasOrganizaciones = RolOrganizacion::select('*')
            ->where('ficha_Personal_id', $fichaPer->id)
            ->get()->all();

        $fichasAnotaciones = Anotacion::select('*')
            ->where('ficha_Personal_id', $fichaPer->id)
            ->get()->all();

        $fichasDomicilios = Domicilio::select('*')
            ->where('ficha_Personal_id', $fichaPer->id)
            ->get()->all();

        $fichasEstudios = Estudio::select('*')
            ->where('fichaPersonal_Id', $fichaPer->id)
            ->get()->all();
        $fichasParientes = Parientes::select('*')
            ->where('ficha_personal_id', $fichaPer->id)
            ->get()->all();

        return view(
            'fichasPersonales.editarFicha',
            compact(
                'fichaPer',
                'paises',
                'ciudades',
                'departamentos',
                'estadosCiviles',
                'situaciones',
                'fuerzas',
                'grados',
                'cuerpos',
                'clasificaciones',
                'unidades',
                'temas',
                'fichaUnidades',
                'fichaTemas',
                'ideologias',
                'profesiones',
                'fichasProfesiones',
                'fichasIdeologias',
                'fichasDomicilios',
                'fichasEstudios',
                'fichasOrganizaciones',
                'organizaciones',
                'tipoAnotaciones',
                'fichasAnotaciones',
                'fichasPerParientes',
                'fichasParientes',
                'parentescos'
            )
        );
    }


    //funcion que se ejecuta cuando quiero editar una ficha personal ya existente
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
        $temas = Tema::all();
        $clasificaciones = Clasificacion::all();
        $ideologias = Ideologia::all();
        $profesiones = Profesion::all();
        $organizaciones = Organizacion::all();
        $tipoAnotaciones = TipoAnotacion::all();
        $parentescos = Parentesco::all();
        //busco la info de la ficha a editar
        $fichaPer = FichaPersonal::find($fichaPersonalId);



        //consigo las unidades de la persona
        $fichaUnidades = Unidad::join('ficha_personal_unidad', 'unidad_Id', '=', 'unidads.id')
            ->select('*')
            ->where('ficha_Personal_Id', $fichaPer->id)->get()->all();

        //consigo LOS TEMAS de la persona
        $fichaTemas = Tema::join('ficha_personal_tema', 'tema_Id', '=', 'temas.id')
            ->select('*')
            ->where('ficha_Personal_Id', $fichaPer->id)->get()->all();

        //obtengo las ideologias de la ficha
        $fichasIdeologias = FichaPersonalIdeologia::select('*')
            ->where('fichaPersonal_id', $fichaPer->id)
            ->get()->all();
        $fichasProfesiones = FichaPersonalProfesion::select('*')
            ->where('fichaPersonal_id', $fichaPer->id)
            ->get()->all();
        $fichasOrganizaciones = RolOrganizacion::select('*')
            ->where('ficha_Personal_id', $fichaPer->id)
            ->get()->all();
        $fichasAnotaciones = Anotacion::select('*')
            ->where('ficha_Personal_id', $fichaPer->id)
            ->get()->all();

        $fichasDomicilios = Domicilio::select('*')
            ->where('ficha_Personal_id', $fichaPer->id)
            ->get()->all();

        $fichasEstudios = Estudio::select('*')
            ->where('fichaPersonal_Id', $fichaPer->id)
            ->get()->all();

        $fichasParientes = FichaPersonal::select('*')
            ->join('parientes', 'ficha_personals.id', '=', 'parientes.ficha_pariente_id')
            ->where('parientes.ficha_personal_id', $fichaPer->id)
            ->get()->all();


        return view(
            'fichasPersonales.editarFicha',
            compact(
                'fichaPer',
                'paises',
                'ciudades',
                'departamentos',
                'estadosCiviles',
                'situaciones',
                'fuerzas',
                'grados',
                'cuerpos',
                'clasificaciones',
                'unidades',
                'temas',
                'fichaTemas',
                'fichaUnidades',
                'ideologias',
                'profesiones',
                'fichasIdeologias',
                'fichasProfesiones',
                'fichasDomicilios',
                'fichasEstudios',
                'organizaciones',
                'fichasOrganizaciones',
                'tipoAnotaciones',
                'fichasAnotaciones',
                'fichasParientes',
                'parentescos'

            )
        );
    }

    //funcion que se ejecuto cuando actualizo la informacion basica de la ficha personal
    public function update(Request $request, $fichaPersonalId)
    {

        $fichasUniViejas = Unidad::join('ficha_personal_unidad', 'unidad_Id', '=', 'unidads.id')
            ->select('*')
            ->where('ficha_Personal_Id', $fichaPersonalId)->get()->all();
        $fichasTemasViejos = Tema::join('ficha_personal_tema', 'tema_Id', '=', 'temas.id')
            ->select('*')
            ->where('ficha_Personal_Id', $fichaPersonalId)->get()->all();

        $fichaPer = FichaPersonal::find($fichaPersonalId);
        $fichaPer->primerNombre = $request->primerNombre;
        $fichaPer->primerApellido = $request->primerApellido;
        $fichaPer->cedula = $request->cedula;
        $fichaPer->otroDocNombre = $request->otroDocNombre;
        $fichaPer->otroDocNumero = $request->otroDocNumero;
        $fichaPer->pais_id = $request->pais_id;
        $fichaPer->departamentos_id = $request->departamentos_id;
        $fichaPer->correoElectronico = $request->correoElectronico;
        $fichaPer->sexo = $request->sexo;
        $fichaPer->estadoIngreso = $request->estadoIngreso;
        $fichaPer->numeroPaquete = $request->numeroPaquete;
        $fichaPer->segundoNombre = $request->segundoNombre;
        $fichaPer->segundoApellido = $request->segundoApellido;
        $fichaPer->credencial = $request->credencial;
        $fichaPer->fechaNac = $request->fechaNac;
        $fichaPer->ciudad_id = $request->ciudad_id;
        $fichaPer->estadoCivil_id = $request->estadoCivil_id;
        $fichaPer->seccionalPolicial = $request->seccionalPolicial;
        $fichaPer->fechaDef = $request->fechaDef;
        $fichaPer->situacion_id = $request->situacion_id;
        $fichaPer->fuerza_id = $request->fuerza_id;
        $fichaPer->grado_id = $request->grado_id;
        $fichaPer->cuerpo_id = $request->cuerpo_id;
        $fichaPer->clasificacion_id = $request->clasificacion_id;

        //return $fichaPer; 
        $fichaPer->save();

        $unidadesInsertar = collect($fichasUniViejas)->pluck('unidad_Id');
        $temasInsertar = collect($fichasTemasViejos)->pluck('tema_Id');

        //esto para actualizar la informacio de las unidades de la ficha
        $fichaPer->unidad()->detach($unidadesInsertar);
        $fichaPer->unidad()->attach($request->get('unidades'));
        $fichaPer->tema()->detach($temasInsertar);
        $fichaPer->tema()->attach($request->get('temas'));

        //return $insertar;
        return back()->with('flash', 'Ficha actualizada con exito');
    }

    //funcion que se ejecuta cuando quiero borrar una ficha personal en la vista general
    public function destroy($fichaPersonalId)
    {
        $fichaPer = FichaPersonal::find($fichaPersonalId);

        $fichaPer->delete();
        //esto para sacar la relacion de las unidades con la ficha
        $fichaPer->unidad()->detach();
        $fichaPer->tema()->detach();

        return redirect()
            ->route('fichasPersonales.index')
            ->with('flash', 'Ficha eliminada con exito');
    }

    //funciones DE LA PARTE DE INGRESOS

    //funcion que se ejecuta cuando quiero ver los postulantes en vista de ingresos
    public function indexIngresos()
    {
        $paises = Pais::all();
        $ciudades = Ciudad::all();
        $departamentos = Departamento::all();
        $estadosCiviles = EstadoCivil::all();
        $situaciones = Situacion::all();
        $fuerzas = Fuerza::all();
        $grados = Grado::all();
        $cuerpos = ArmaCuerpo::all();
        $temas = Tema::all();
        $clasificaciones = Clasificacion::all();

        $fichasPer = FichaPersonal::select('*')
            ->select('*')
            ->where('situacion_id', 2)->get()->all();


        return view('fichasIngresos.index', compact(
            'fichasPer',
            'paises',
            'ciudades',
            'departamentos',
            'estadosCiviles',
            'situaciones',
            'fuerzas',
            'grados',
            'cuerpos',
            'temas',
            'clasificaciones'
        ));
    }

    //funcion que se ejecuta cuando creo un nuevo ingreso en el modal principal
    public function storeIngreso(Request $request)
    {

        $fichaPer = new FichaPersonal();
        $fichaPer->primerNombre = $request->primerNombre;
        $fichaPer->primerApellido = $request->primerApellido;
        $fichaPer->cedula = $request->cedula;
        $fichaPer->otroDocNombre = $request->otroDocNombre;
        $fichaPer->otroDocNumero = $request->otroDocNumero;
        $fichaPer->pais_id = $request->pais_id;
        $fichaPer->departamentos_id = $request->departamentos_id;
        $fichaPer->correoElectronico = $request->correoElectronico;
        $fichaPer->sexo = $request->sexo;
        $fichaPer->estadoIngreso = $request->estadoIngreso;
        $fichaPer->numeroPaquete = $request->numeroPaquete;
        $fichaPer->segundoNombre = $request->segundoNombre;
        $fichaPer->segundoApellido = $request->segundoApellido;
        $fichaPer->credencial = $request->credencial;
        $fichaPer->fechaNac = $request->fechaNac;
        $fichaPer->ciudad_id = $request->ciudad_id;
        $fichaPer->estadoCivil_id = EstadoCivil::find($estado = $request->estadoCivil_id)
            ? $estado
            : EstadoCivil::create(['nombre' => $estado])->id;

        $fichaPer->seccionalPolicial = $request->seccionalPolicial;
        $fichaPer->fechaDef = $request->fechaDef;
        $fichaPer->situacion_id = $request->situacion_id;
        $fichaPer->fuerza_id = $request->fuerza_id;
        $fichaPer->grado_id = $request->grado_id;
        $fichaPer->cuerpo_id = $request->cuerpo_id;
        $fichaPer->clasificacion_id = $request->clasificacion_id;

        // $fichaPer->save();
        return back()->with('flash', 'Persona creada con exito');
    }


    //funcion que cambia el estado de postulante a activo
    public function updateIngreso($fichaPersonalId)
    {

        $fichaPer = FichaPersonal::find($fichaPersonalId);
        $fichaPer->situacion_id = 1;
        $fichaPer->save();
        return back()->with('flash', 'Postulante pasado a ACTIVO');
    }
}
