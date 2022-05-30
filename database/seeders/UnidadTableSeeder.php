<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unidad;

class UnidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unidad::truncate();
       $unidad = new Unidad();
       $unidad->sigla="SEGIT";
       $unidad->nombre="Servicio de Gestion Informatica y telecomunicaciones de la armada";
       $unidad->save();
       
       $unidad = new Unidad();
       $unidad->sigla="EMINT";
       $unidad->nombre="estado mayor de inteligencia";
       $unidad->save();
       
       $unidad = new Unidad();
       $unidad->sigla="SOHMA";
       $unidad->nombre="servicio de oceanografia hidrografia y meteorologia de la armada";
       $unidad->save();
       
       $unidad = new Unidad();
       $unidad->sigla="EMCOM";
       $unidad->nombre="estado mayor de comunicaciones";
       $unidad->save();
       
    }
}
