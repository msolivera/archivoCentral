<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    use HasFactory;
    
    public function dossierObservaciones()
    {
       return $this->hasMany(DossierObservaciones::class);
    }
    public function clasificacion()
    {
        return $this->belongsTo(Clasificacion::class, 'clasificacions_id');
    }
    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class, 'ubicacion_id');

    }
    public function serieDocumental()
    {
        return $this->belongsTo(SerieDocumental::class, 'serie_documental_id');
    }
}
