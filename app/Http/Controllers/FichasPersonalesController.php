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
        //return $fichasPer;
    }
    public function show($fichaPersonalId)
    {
        //consigo la info basica de la persona
        $fichaPer = FichaPersonal::find($fichaPersonalId);
        //consigo las unidades de la persona
        $unidades = Unidad::join('ficha_personal_unidad', 'unidad_Id', '=', 'unidads.id')
            ->select('*')
            ->where('ficha_Personal_Id', $fichaPer->id)->get()->all();


        $fichasIdeologias = FichaPersonalIdeologia::select('*')
            ->where('fichaPersonal_id', $fichaPer->id)
            ->get()->all();


        return view('fichasPersonales.verFicha', compact('fichaPer', 'unidades', 'fichasIdeologias'));
    }

    public function store(Request $request)
    {
        /* $this->validate($request, [
            'primerNombre' => 'required',
            'primerApellido' => 'required'   
        ]);
        */
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

        //return $fichaPer; 
        $fichaPer->save();

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

        

        $fichasDomicilios = Domicilio::select('*')
            ->where('ficha_Personal_id', $fichaPer->id)
            ->get()->all();

        $fichasEstudios = Estudio::select('*')
            ->where('fichaPersonal_Id', $fichaPer->id)
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
                'organizaciones'
            )
        );
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
        $temas = Tema::all();
        $clasificaciones = Clasificacion::all();
        $ideologias = Ideologia::all();
        $profesiones = Profesion::all();
        $organizaciones = Organizacion::all();
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

        $fichasDomicilios = Domicilio::select('*')
            ->where('ficha_Personal_id', $fichaPer->id)
            ->get()->all();

        $fichasEstudios = Estudio::select('*')
            ->where('fichaPersonal_Id', $fichaPer->id)
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
                'fichasOrganizaciones'
            )
        );
    }
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


    //se comenta porque no se va a utilizar por el momento.

    /*public function create()
    {
        $unidades = Unidad::all();
        $paises = Pais::all();
        return view('fichasPersonales.crearFicha' ,compact('unidades', 'paises'));
    }*/
}
