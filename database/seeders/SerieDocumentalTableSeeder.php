<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SerieDocumental;


class SerieDocumentalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SerieDocumental::truncate();
        $clasificacion = new SerieDocumental();
        $clasificacion->nombre="SERIE 1";
        $clasificacion->save();
        
        $clasificacion = new SerieDocumental();
        $clasificacion->nombre="SERIE 2";
        $clasificacion->save();

        $clasificacion = new SerieDocumental();
        $clasificacion->nombre="SERIE 3";
        $clasificacion->save();

    }
}
