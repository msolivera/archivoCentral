<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(DepartamentoTableSeeder::class);
        $this->call(EstadoCivilTableSeeder::class);
        $this->call(PaisTableSeeder::class);
        $this->call(CiudadTableSeeder::class);
        $this->call(ParienteTableSeeder::class);
        $this->call(TipoEstudioTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(FichaPersonalTableSeeder::class);
        $this->call(UnidadTableSeeder::class);
    }
}
