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
       return $this->belongsTo(Pais::class, 'paisId');
    }
    //Relacion N->1
    public function clasificacion(){
        return $this->belongsTo(Clasificacion::class, 'clasificacionId');
    }
    public function departamento(){
        return $this->belongsTo(Departamento::class, 'departamentoId');
     }
    public function estadoCivil(){
        return $this->belongsTo(EstadoCivil::class, 'estadoCivilId');
    }
    public function ciudad(){
        return $this->belongsTo(Ciudad::class, 'ciudadId');
    }
    public function fuerza(){
        return $this->belongsTo(Fuerza::class, 'fuerzaId');
    }
    public function grado(){
        return $this->belongsTo(Grado::class, 'gradoId');
    }
    public function armaCuerpo(){
        return $this->belongsTo(ArmaCuerpo::class, 'cuerpoId');
    }
    public function situacion(){
        return $this->belongsTo(Situacion::class, 'situacionId');
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

    public function fichaPersonalIdeologia()
{
   return $this->hasMany(FichaPersonalIdeologia::class);
}
    public function fichaPersonalProfesion()
{
   return $this->hasMany(FichaPersonalProfesion::class);
}

   
}
