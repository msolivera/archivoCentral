<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ubicacion;

class UbicacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ubicacion::truncate();
        $ubicacion = new Ubicacion();
        $ubicacion->nombre="Seguridad";
        $ubicacion->save();
        
        $ubicacion = new Ubicacion();
        $ubicacion->nombre="Inteligencia";
        $ubicacion->save();
        
        $ubicacion = new Ubicacion();
        $ubicacion->nombre="Fuentes Abiertas";
        $ubicacion->save();
        
        $ubicacion = new Ubicacion();
        $ubicacion->nombre="Maritimo";
        $ubicacion->save();
        
        $ubicacion = new Ubicacion();
        $ubicacion->nombre="Archivo Central";
        $ubicacion->save();
        
        $ubicacion = new Ubicacion();
        $ubicacion->nombre="Biblioteca";
        $ubicacion->save();
        
        $ubicacion = new Ubicacion();
        $ubicacion->nombre="Secretaria";
        $ubicacion->save();
        
    }
}
