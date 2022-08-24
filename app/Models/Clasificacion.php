<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
    use HasFactory;

    public function fichasPersonales()
{
   return $this->hasMany(FichaPersonal::class);
}
public function fichaImpersonal()
{
   return $this->hasMany(FichaImpersonal::class);
}

}
