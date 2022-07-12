<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Organizacion;

class OrganizacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organizacion::truncate();

        $organizacion = new Organizacion();
        $organizacion->nombre ="Asociación Cristiana de Jóvenes /Instituto de Desarrollo Humano (ACJ-IDHU)";
        $organizacion->save();

        $organizacion = new Organizacion();
        $organizacion->nombre ="Plenario de Mujeres del Uruguay (PLEMUU)";
        $organizacion->save();

        $organizacion = new Organizacion();
        $organizacion->nombre ="Fundación ACAC- Uruguay Solidario.";
        $organizacion->save();

        $organizacion = new Organizacion();
        $organizacion->nombre ="Casa de la Mujer.";
        $organizacion->save();

        $organizacion = new Organizacion();
        $organizacion->nombre ="Red Uruguaya Contra la Violencia y el Abuso Sexual.";
        $organizacion->save();

        $organizacion = new Organizacion();
        $organizacion->nombre ="Servicio Paz y Justicia (SERPAJ)";
        $organizacion->save();

        $organizacion = new Organizacion();
        $organizacion->nombre ="PIT CNT- Instituto Cuesta Duarte.";
        $organizacion->save();
    }
}
