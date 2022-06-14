<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizacion extends Model
{
    use HasFactory;
    public function fichasPersonales(){
        return $this->belongsToMany(FichaPersonal::class);
    }

    public function rolOrganizacion()
    {
       return $this->hasMany(RolOrganizacion::class);
    }
    
}
