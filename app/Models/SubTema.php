<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTema extends Model
{
    use HasFactory;


    public function temas(){
        return  $this->belongsTo(Tema::class,'tema_id');
    }
}
