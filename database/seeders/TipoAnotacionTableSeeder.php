<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoAnotacion;

class TipoAnotacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoAnotacion::truncate();
        $tipo = new TipoAnotacion();
        $tipo->nombre="RRHH";
        $tipo->save();
        
        $tipo = new TipoAnotacion();
        $tipo->nombre="Evento/Caso";
        $tipo->save();

        $tipo = new TipoAnotacion();
        $tipo->nombre="Accion N2";
        $tipo->save();

        $tipo = new TipoAnotacion();
        $tipo->nombre="Fuente Documento";
        $tipo->save();

        $tipo = new TipoAnotacion();
        $tipo->nombre="Observacion Seg. Personal";
        $tipo->save();

        $tipo = new TipoAnotacion();
        $tipo->nombre="Solicitud";
        $tipo->save();

        $tipo = new TipoAnotacion();
        $tipo->nombre="Satatus";
        $tipo->save();
    }
}
