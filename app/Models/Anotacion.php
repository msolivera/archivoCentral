<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anotacion extends Model
{
    use HasFactory;
    public function fichasPersonales(){
        return $this->belongsTo(FichaPersonal::class);
    }
    public function tipoAnotacion()
    {
       return $this->belongsTo(TipoAnotacion::class, 'tipo_anotacion_id');
    }
}
