<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ideologia;

class IdeologiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ideologia::truncate();
        $ideologia = new Ideologia();
        $ideologia->nombre="Liberalismo";
        $ideologia->save();

        $ideologia = new Ideologia();
        $ideologia->nombre="Anarquismo";
        $ideologia->save();

        $ideologia = new Ideologia();
        $ideologia->nombre="Nacionalismo";
        $ideologia->save();

        $ideologia = new Ideologia();
        $ideologia->nombre="Socialismo";
        $ideologia->save();


    }
}
