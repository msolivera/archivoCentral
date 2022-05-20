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

    //Relaciones N->1
    public function pais(){
        $this->belongsTo(Pais::class);
    }
    //Relacion N->1
    public function clasificacion(){
        $this->belongsTo(Clasificacion::class);
    }
    public function departamento(){
        $this->belongsTo(Departamento::class);
    }
    public function estadoCivil(){
        $this->belongsTo(EstadoCivil::class);
    }
    public function ciudad(){
        $this->belongsTo(Ciudad::class);
    }
    public function fuerza(){
        $this->belongsTo(Fuerza::class);
    }
    public function grado(){
        $this->belongsTo(Grado::class);
    }
    public function armaCuerpo(){
        $this->belongsTo(ArmaCuerpo::class);
    }
    public function situacion(){
        $this->belongsTo(Situacion::class);
    }


    //Relaciones N->N
    public function unidad(){
        return $this->belongsToMany(Unidad::class);
    }
    public function profesion(){
        return $this->belongsToMany(Profesion::class);
    }
    public function ideologia(){
        return $this->belongsToMany(Ideologia::class);
    }
    public function anotacion(){
        return $this->belongsToMany(Anotacion::class);
    }
    public function tema(){
        return $this->belongsToMany(Tema::class);
    }
    public function organizacion(){
        return $this->belongsToMany(Organizacion::class);
    }
    public function fichaImpersonal(){
        return $this->belongsToMany(FichaImpersonal::class);
    }
    public function documento(){
        return $this->belongsToMany(Documento::class);
    }
    public function dossier(){
        return $this->belongsToMany(Dossier::class);
    }
    public function estudio(){
        return $this->belongsToMany(Estudio::class);
    }

   
}
