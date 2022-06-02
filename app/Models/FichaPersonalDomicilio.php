<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaPersonalDomicilio extends Model
{
    use HasFactory;
    protected $fillable = [
        'fichaPersonal_id',
        'observacion_id',

    ];

    public function fichaPersonal()
    {
        return $this->belongsTo(FichaPersonal::class, 'fichaPersonal_id');
    }
    public function observacion()
    {
        return $this->belongsTo(Profesion::class, 'observacion_id');
    }
}
