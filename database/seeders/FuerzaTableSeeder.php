<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fuerza;

class FuerzaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fuerza::truncate();
        $fuerza = new Fuerza();
        $fuerza->nombre="Armada";
        $fuerza->save();
        
        $fuerza = new Fuerza();
        $fuerza->nombre="Ejército";
        $fuerza->save();

        $fuerza = new Fuerza();
        $fuerza->nombre="Fuerza Aérea";
        $fuerza->save();
    }
}
