<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FichaPersonal;

class FichaPersonalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FichaPersonal::truncate();
        $persona = new FichaPersonal();
        $persona->cedula = 5234220;
        $persona->PrimerNombre = 'micaela';
        $persona->PrimerApellido = 'olivera';
        $persona->paisId = 1;
        $persona->save();
        
        $persona = new FichaPersonal();
        $persona->cedula = 4596553;
        $persona->PrimerNombre = 'federico';
        $persona->PrimerApellido = 'alonso';
        $persona->paisId = 1;
        $persona->save();
        
        $persona = new FichaPersonal();
        $persona->cedula = 8795664;
        $persona->PrimerNombre = 'cristian';
        $persona->PrimerApellido = 'palma';
        $persona->paisId = 1;
        $persona->save();
        
        $persona = new FichaPersonal();
        $persona->cedula = 42165332;
        $persona->PrimerNombre = 'marcelo';
        $persona->PrimerApellido = 'olivera';
        $persona->paisId = 1;
        $persona->save();
    }
}
