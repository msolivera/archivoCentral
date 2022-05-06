<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Situacion;

class SituacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Situacion::truncate();
        $situacion = new Situacion();
        $situacion->nombre="Activo";
        $situacion->save();
        
        $situacion = new Situacion();
        $situacion->nombre="Postulante";
        $situacion->save();

        $situacion = new Situacion();
        $situacion->nombre="Retirado";
        $situacion->save();
        
    }
}
