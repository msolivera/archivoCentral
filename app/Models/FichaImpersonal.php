<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaImpersonal extends Model
{
    use HasFactory;
    public function fichaPersonalRelacionada()
    {
        return $this->hasMany(FichaPersonalRelacionada::class);
    }
    public function clasificacion()
    {
        return $this->belongsTo(Clasificacion::class, 'clasificacion_id');
    }
    public function tema()
    {
        return $this->belongsToMany(Tema::class);
    }
    public function unidad()
    {
        return $this->belongsToMany(Unidad::class);
    }
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    /*public function observaciones()
    {
       return $this->hasMany(Observaciones::class);
    }*/
    
    public function fichaImpersonalObservaciones()
    {
       return $this->hasMany(FichaImpersonalObservaciones::class);
    }
}
