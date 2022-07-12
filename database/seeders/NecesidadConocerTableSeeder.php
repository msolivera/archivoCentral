<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NecesidadConocer;

class NecesidadConocerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NecesidadConocer::truncate();
        $necesidadConocer = new NecesidadConocer();
        $necesidadConocer->nombre="Seguridad";
        $necesidadConocer->save();

        $necesidadConocer = new NecesidadConocer();
        $necesidadConocer->nombre="Fuentes Abiertas";
        $necesidadConocer->save();

        $necesidadConocer = new NecesidadConocer();
        $necesidadConocer->nombre="Inteligencia";
        $necesidadConocer->save();

        $necesidadConocer = new NecesidadConocer();
        $necesidadConocer->nombre="Maritimo";
        $necesidadConocer->save();
    }
}
