<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossierObservaciones extends Model
{
    use HasFactory;
    public function dossier()
    {
        return $this->belongsTo(Dossier::class);
    }
}
