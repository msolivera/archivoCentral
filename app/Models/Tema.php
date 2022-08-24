<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;
    public function subTemas()
    {
       return $this->hasMany(SubTemas::class);
       
    }
    public function fichasPersonales(){
        return $this->belongsToMany(FichaPersonal::class);
    }
    public function fichaImpersonal(){
        return $this->belongsToMany(FichaImpersonal::class);
    }
}
