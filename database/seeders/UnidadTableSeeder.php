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
       $unidad->nombre="SEGIT";
       $unidad->save();
       
       $unidad = new Unidad();
       $unidad->nombre="EMINT";
       $unidad->save();
       
       $unidad = new Unidad();
       $unidad->nombre="SOHMA";
       $unidad->save();
       
       $unidad = new Unidad();
       $unidad->nombre="EMCOM";
       $unidad->save();
       
    }
}
