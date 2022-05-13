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
        $this->call(TipoEstudioTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(FichaPersonalTableSeeder::class);
        $this->call(UnidadTableSeeder::class);
        $this->call(ClasificacionTableSeeder::class);
        $this->call(FuerzaTableSeeder::class);
        $this->call(ArmaCuerpoTableSeeder::class);
        $this->call(GradoTableSeeder::class);
        $this->call(SituacionTableSeeder::class);
        $this->call(UbicacionTableSeeder::class);
        $this->call(TipoAnotacionTableSeeder::class);

    }
}
