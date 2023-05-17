<?php

namespace App\Http\Controllers;

use App\Models\FichaPersonal;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
   public function Store ($fichaperId){

    $archivo = request()->file('archivo')->store('public');

    Photo::create([
        'url' => Storage::url($archivo),
        'ficha_personal_Id' => $fichaperId
    ]);
   }
   
   public function StoreImpersonal ($fichaImperId){

    $archivo = request()->file('archivo')->store('public');

    Photo::create([
        'url' => Storage::url($archivo),
        'ficha_impersonal_Id' => $fichaImperId
    ]);
   }
   public function StoreDossier ($dossierId){

    $archivo = request()->file('archivo')->store('public');

    Photo::create([
        'url' => Storage::url($archivo),
        'dossier_Id' => $dossierId
    ]);
   }
}
