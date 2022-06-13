<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    use HasFactory;

    public function fichaPersonal()
    {
        return $this->belongsTo(FichaPersonal::class, 'ficha_Personal_Id');
    }
}
