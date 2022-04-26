<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parentesco;

class ParentescoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $parentescos = Parentesco::all();
        return view('parentesco.index',compact('parentescos'));
    }

    public function destroy($parentescoId){
        $parentesco = Parentesco::find($parentescoId);

        $parentesco->delete();
        return redirect()
            ->route('parentesco.index')
            ->with('flash', 'Parentesco eliminado con exito');

    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'nombre' => 'required', 
        ]);
        
        //validacion falta
        $parentesco = new Parentesco();
        $parentesco->nombre = $request->nombre;
        $parentesco->save();

        return back()->with('flash', 'Parentesco creado con exito');        
        
    }
    public function edit($parentescoId)
    {
        $parentesco = Parentesco::find($parentescoId);
        return view('parentesco.editar', 
        compact('parentesco'));

    
    }

    public function update(Request $request, $parentescoId)
    {

        $this->validate($request, [
            'nombre' => 'required',
        ]);

        $parentesco = Parentesco::find($parentescoId);
        $parentesco->nombre = $request->nombre;
        $parentesco->save();

        return back()->with('flash', 'Parentesco actualizado con exito');        
        
    }
}
