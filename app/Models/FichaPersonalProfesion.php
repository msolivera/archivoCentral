<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaPersonalProfesion extends Model
{
    use HasFactory;
    protected $fillable = [
        'fichaPersonal_id',
        'profesion_id',
   
    ];

    public function fichaPersonal(){
        return $this->belongsTo(FichaPersonal::class, 'fichaPersonal_id');
     }
     public function profesion(){
        return $this->belongsTo(Profesion::class, 'profesion_id');
     }
}
