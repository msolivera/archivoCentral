<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaPersonalIdeologia extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'fichaPersonal_id',
        'ideologia_id',
   
    ];
    public function fichaPersonal(){
        return $this->belongsTo(FichaPersonal::class, 'fichaPersonal_id');
     }
     public function ideologia(){
        return $this->belongsTo(Ideologia::class, 'ideologia_id');
     }
}
