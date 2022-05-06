<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grado;

class GradoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grado::truncate();
        $grado = new Grado();
        $grado->nombre="Guardiamarina";
        $grado->sigla="GM";
        $grado->fuerza_id=1;
        $grado->save();
        
        $grado = new Grado();
        $grado->nombre="Alférez de Fragata";
        $grado->sigla="AF";
        $grado->fuerza_id=1;
        $grado->save();

        $grado = new Grado();
        $grado->nombre="Alférez de Navío";
        $grado->sigla="AN";
        $grado->fuerza_id=1;
        $grado->save();

        $grado = new Grado();
        $grado->nombre="Teniente de Navío";
        $grado->sigla="TN";
        $grado->fuerza_id=1;
        $grado->save();

        $grado = new Grado();
        $grado->nombre="Capitán de Corbeta";
        $grado->sigla="CC";
        $grado->fuerza_id=1;
        $grado->save();

        $grado = new Grado();
        $grado->nombre="Capitán de Fragata";
        $grado->sigla="CF";
        $grado->fuerza_id=1;
        $grado->save();

        $grado = new Grado();
        $grado->nombre="Capitán de Navío";
        $grado->sigla="CN";
        $grado->fuerza_id=1;
        $grado->save();

        $grado = new Grado();
        $grado->nombre="Contralmirante";
        $grado->sigla="CA";
        $grado->fuerza_id=1;
        $grado->save();

        $grado = new Grado();
        $grado->nombre="Almirante";
        $grado->sigla="ALTE";
        $grado->fuerza_id=1;
        $grado->save();
    }
}
