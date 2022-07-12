<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ambito;

class AmbitoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ambito::truncate();
        $ambito = new Ambito();
        $ambito->nombre="Maritimo";
        $ambito->save();
        
        $ambito = new Ambito();
        $ambito->nombre="Nacional";
        $ambito->save();

        $ambito = new Ambito();
        $ambito->nombre="Internacional";
        $ambito->save();

    }
}
