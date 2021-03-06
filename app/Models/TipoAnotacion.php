<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAnotacion extends Model
{
    use HasFactory;
    public function anotacion()
    {
       return $this->hasMany(Anotacion::class);
    }
}
