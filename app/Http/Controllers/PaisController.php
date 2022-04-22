<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;

class PaisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $paises = Pais::all();
        return view('paises.index',compact('paises'));
    }

    public function destroy($paisId){
        $pais = Pais::find($paisId);

        $pais->delete();
        return redirect()
            ->route('paises.index')
            ->with('flash', 'Pais eliminada con exito');

    }
}
