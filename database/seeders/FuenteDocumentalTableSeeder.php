<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FuenteDocumento;

class FuenteDocumentalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FuenteDocumento::truncate();
        $fuenteDocumental = new FuenteDocumento();
        $fuenteDocumental->nombre="Prensa";
        $fuenteDocumental->save();

        $fuenteDocumental = new FuenteDocumento();
        $fuenteDocumental->nombre="Agencia";
        $fuenteDocumental->save();

        $fuenteDocumental = new FuenteDocumento();
        $fuenteDocumental->nombre="Propia";
        $fuenteDocumental->save();

        $fuenteDocumental = new FuenteDocumento();
        $fuenteDocumental->nombre="Fuente Humana";
        $fuenteDocumental->save();

    }
}
