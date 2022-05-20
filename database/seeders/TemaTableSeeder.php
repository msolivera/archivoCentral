<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tema;

class TemaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tema::truncate();
       $tema = new Tema();
       $tema->nombre="SEGURIDAD";
       $tema->save();
       
       $tema = new Tema();
       $tema->nombre="MARITIMO";
       $tema->save();
       
       $tema = new Tema();
       $tema->nombre="FUENTES";
       $tema->save();
       
       $tema = new Tema();
       $tema->nombre="INTELIGENCIA";
       $tema->save();
       
    }
}
