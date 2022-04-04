<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ciudad;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CiudadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    Ciudad::truncate();
    DB::table('ciudads')->delete();
    $json = File::get("documentacion/ciudad_barrio.json");
    $data = json_decode($json);
    foreach ($data as $obj) {
        Ciudad::create(array(
            'nombre' => $obj->nombre,
            'departamento_id' => $obj->departamento_id,
            
        ));
    }
    }
}
