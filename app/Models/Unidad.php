<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;


    public function fichasPersonales(){
        return $this->belongsToMany(FichaPersonal::class);
    }
    public function fichaImpersonal(){
        return $this->belongsToMany(FichaImpersonal::class);
    }
}
