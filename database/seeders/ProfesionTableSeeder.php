<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profesion;

class ProfesionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profesion::truncate();
        $profesion = new Profesion();
        $profesion->nombre="Ingeniero";
        $profesion->save();

        $profesion = new Profesion();
        $profesion->nombre="Arquitecto";
        $profesion->save();
        
        $profesion = new Profesion();
        $profesion->nombre="Economista";
        $profesion->save();

        $profesion = new Profesion();
        $profesion->nombre="Profesor";
        $profesion->save();

        $profesion = new Profesion();
        $profesion->nombre="Comerciante";
        $profesion->save();

        $profesion = new Profesion();
        $profesion->nombre="Obrero";
        $profesion->save();

        $profesion = new Profesion();
        $profesion->nombre="Administrativo";
        $profesion->save();
    }
}
