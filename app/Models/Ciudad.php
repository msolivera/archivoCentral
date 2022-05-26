<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    public function departamento(){
        return $this->belongsTo(Departamento::class,'departamentoId');
    }
    public function fichasPersonales()
    {
       return $this->hasMany(FichaPersonal::class);
    }
}
