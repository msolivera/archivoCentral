<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EstadoCivil;

class EstadoCivilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EstadoCivil::truncate();

        $soltero = new EstadoCivil();
        $soltero->nombre = 'Soltero/a';
        $soltero->save();

        $casado = new EstadoCivil();
        $casado->nombre = 'Casado/a';
        $casado->save();

        $concubino = new EstadoCivil();
        $concubino->nombre = 'Unión concubinaria';
        $concubino->save();

        $divorciado = new EstadoCivil();
        $divorciado->nombre = 'Divorciado/a';
        $divorciado->save();

        $viudo = new EstadoCivil();
        $viudo->nombre = 'Viudo/a';
        $viudo->save();
    }
}
