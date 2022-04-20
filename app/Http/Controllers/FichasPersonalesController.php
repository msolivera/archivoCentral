<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\FichaPersonal;
use App\Models\Unidad;
use App\Models\Pais;

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
        $fichasPer = FichaPersonal::all();
        return view('fichasPersonales.index',compact('fichasPer'));
    }

    public function create()
    {
        $unidades = Unidad::all();
        $paises = Pais::all();
        return view('fichasPersonales.crearFicha' ,compact('unidades', 'paises'));
    }

    public function store(Request $request)
    {
        //return $request->all();
        
        $this->validate($request, [
            'primerNombre' => 'required',
            'primerApellido' => 'required'   
        ]);
        
        //validacion falta
        $fichaPer = new FichaPersonal();
        $fichaPer->primerNombre = $request->primerNombre;
        $fichaPer->primerApellido = $request->primerApellido;
        $fichaPer->cedula = $request->cedula;
        $fichaPer->fechaNac = $request->fechaNac;
        $fichaPer->paisId = $request->paisId;
        $fichaPer->save();

        
        $fichaPer->unidad()->attach($request->get('unidades'));

        return back()->with('flash', 'Ficha creada con exito');        
        
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
        $fichaPer = FichaPersonal::find($fichaPersonalId);
        $unidades = Unidad::all();
        $paises = Pais::all();
        //consigo el pais de la persona
        $resPais = Pais::where('id', $fichaPer->id)->get()->all();
        $fichaPais= $resPais[0];
        //consigo las unidades de la persona
        $fichaUnidades = Unidad::join('ficha_personal_unidad','unidad_Id','=','unidads.id' )
                        ->select('unidads.nombre')
                        ->where('ficha_Personal_Id', $fichaPer->id)->get()->all();
        return view('fichasPersonales.editarFicha', compact('fichaPer', 'unidades', 'paises', 'fichaPais', 'fichaUnidades'));
    
    }
    public function update(Request $request, $fichaPersonalId)
    {
        $this->validate($request, [
            'primerNombre' => 'required',
            'primerApellido' => 'required'   
        ]);
        
        $fichaPer = FichaPersonal::find($fichaPersonalId);
        $fichaPer->primerNombre = $request->primerNombre;
        $fichaPer->primerApellido = $request->primerApellido;
        $fichaPer->cedula = $request->cedula;
        $fichaPer->fechaNac = $request->fechaNac;
        $fichaPer->paisId = $request->paisId;
        $fichaPer->unidad()->attach($request->get('unidades'));
        $fichaPer->save();

        return back()->with('flash', 'Ficha actualizada con exito');
    }


}