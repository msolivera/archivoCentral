<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tema;
use App\Models\SubTema;

class SubTemaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

        $subTemas = SubTema::all();
        return view('subTema.index',compact('subTemas'));

    }

    public function create()
    {
        $temas = Tema::all();
        return view('subTema.crear' ,compact('temas'));
    }

    public function store(Request $request)
    {

        
        $subTema = new SubTema();
        $subTema->nombre = $request->nombre;
        $subTema->tema_id = $request->tema_id;
        $subTema->save();

        return back()->with('flash', 'SubTema creado con exito');        
        
    }


    public function edit($subTemaId)
    {
        $subTema = SubTema::find($subTemaId);
        $temas = Tema::all();


        $resSubTema = Tema::where('id', $subTema->id)->get()->all();
        $subTemaTema = $resSubTema[0];
     
       return view('subTema.editar', 
                compact('subTema', 'temas', 'subTemaTema'));
    }

    public function update(Request $request, $subTemaId)
    {
      
        $subTema = SubTema::find($subTemaId);
        $subTema->nombre = $request->nombre;
        $subTema->tema_id = $request->tema_id;
        $subTema->save();

        return back()->with('flash', 'SubTema actualizado con exito');
    }

    public function destroy($subTemaId){

        $subTema = SubTema::find($subTemaId);
        $subTema->delete();

        return redirect()
            ->route('subTema.index')
            ->with('flash', 'SubTema eliminado con exito');

    }
}
