<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaPersonal extends Model
{
    use HasFactory;
    protected $fillable = [
        'primerNombre',
        'primerApellido',
        'cedula'    
    ];

    //Relacion N->1 Muchas fichas pueden tener 1 mismo pais.
    public function pais(){
        $this->belongsTo(Pais::class);
    }
    //Relacion N->N
    public function unidad(){
        return $this->belongsToMany(Unidad::class);
    }
   
}
