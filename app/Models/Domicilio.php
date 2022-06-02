<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    use HasFactory;
    public function fichasPersonales()
    {
        return $this->belongsToMany(FichaPersonal::class);
    }

    public function fichaPersonalDomicilio()
    {
        return $this->hasMany(FichaPersonalDomicilio::class);
    }
}
