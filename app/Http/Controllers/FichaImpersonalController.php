<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FichaImpersonal; 
use App\Models\Clasificacion; 
use App\Models\Tema; 
use App\Models\Unidad; 

class FichaImpersonalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clasificaciones = Clasificacion::all();
        $fichasImper = FichaImpersonal::all();
        return view('fichasImpersonales.index', compact('fichasImper', 'clasificaciones'));
    }

    public function destroy($fichaImpersonalId){
        $fichaImpersonal = fichaImpersonal::find($fichaImpersonalId);

        $fichaImpersonal->delete();
        return redirect()
            ->route('fichaImpersonal.index')
            ->with('flash', 'Ficha Impersonal eliminada con exito');

    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'nombre' => 'required', 
            'clasificacion_id' => 'required', 
        ]);
        
        //validacion falta
        $fichaImpersonal = new fichaImpersonal();
        $fichaImpersonal->nombre = $request->nombre;
        $fichaImpersonal->clasificacion_id = $request->clasificacion_id;
        $fichaImpersonal->save();

        /*$fichaTemas = Tema::join('ficha_personal_tema', 'tema_Id', '=', 'temas.id')
            ->select('*')
            ->where('ficha_Personal_Id', $fichaPer->id)->get()->all();*/

        return back()->with('flash', 'Ficha Impersonal creada con exito');        
        
    }
    public function edit($fichaImpersonalId)
    {
        $clasificaciones = Clasificacion::all();
        $unidades = Unidad::all();
        $temas = Tema::all();
        $fichaImpersonal = fichaImpersonal::find($fichaImpersonalId);
        return view('fichasImpersonales.editarFicha', compact('fichaImpersonal', 'temas', 'unidades', 'clasificaciones'));

    
    }

    public function update(Request $request, $fichaImpersonalId)
    {

        $this->validate($request, [
            'nombre' => 'required', 
            //'clasificacion_id' => 'required', 
        ]);

        $fichaImpersonal = fichaImpersonal::find($fichaImpersonalId);
        $fichaImpersonal->nombre = $request->nombre;
        $fichaImpersonal->clasificacion_id = $request->clasificacion_id;
        $fichaImpersonal->save();

        

        return back()->with('flash', 'Ficha Impersonal actualizada con exito');        
        
    }
}
