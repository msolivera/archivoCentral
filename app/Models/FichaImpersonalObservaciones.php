<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaImpersonalObservaciones extends Model
{
    use HasFactory;

    public function fichasImpersonales()
    {
        return $this->belongsTo(FichaImpersonal::class);
    }
}
