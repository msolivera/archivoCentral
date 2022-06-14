<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolOrganizacion extends Model
{
    use HasFactory;

    public function fichasPersonales(){
        return $this->belongsTo(FichaPersonal::class,'ficha_Personal_id');
    }

    public function organizacion()
    {
       return $this->belongsTo(Organizacion::class, 'organizacion_id');
    }
    
}
