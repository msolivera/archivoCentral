<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoEstudio;

class TipoEstudioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoEstudio::truncate();
        
        $primaria = new TipoEstudio();
        $primaria->nombre = 'Primaria';
        $primaria->save();

        $cicloBasico = new TipoEstudio();
        $cicloBasico->nombre = 'Ciclo Basico';
        $cicloBasico->save();

        $bachillerato = new TipoEstudio();
        $bachillerato->nombre = 'Bachillerato';
        $bachillerato->save();

        $universitario = new TipoEstudio();
        $universitario->nombre = 'Terciario';
        $universitario->save();
        
        $curso = new TipoEstudio();
        $curso->nombre = 'Curso';
        $curso->save();

        $otro = new TipoEstudio();
        $otro->nombre = 'Otro Estudio';
        $otro->save();
    }
}
