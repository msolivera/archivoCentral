<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Clasificacion;


class ClasificacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Clasificacion::truncate();
        $clasificacion = new Clasificacion();
        $clasificacion->nombre="Público";
        $clasificacion->save();
        
        $clasificacion = new Clasificacion();
        $clasificacion->nombre="Reservado";
        $clasificacion->save();

        $clasificacion = new Clasificacion();
        $clasificacion->nombre="Confidencial";
        $clasificacion->save();

        $clasificacion = new Clasificacion();
        $clasificacion->nombre="Secreto";
        $clasificacion->save();
    }
}
