<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ArmaCuerpo;

class ArmaCuerpoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArmaCuerpo::truncate();
        $armaCuerpo = new ArmaCuerpo();
        $armaCuerpo->nombre="Cuerpo General";
        $armaCuerpo->sigla="CG";
        $armaCuerpo->save();
        
        $armaCuerpo = new ArmaCuerpo();
        $armaCuerpo->nombre="Cuerpo Prefectura";
        $armaCuerpo->sigla="CP";
        $armaCuerpo->save();

        $armaCuerpo = new ArmaCuerpo();
        $armaCuerpo->nombre="Cuerpo de Ingenieros en Maquinas y Electricidad";
        $armaCuerpo->sigla="CIME";
        $armaCuerpo->save();

        $armaCuerpo = new ArmaCuerpo();
        $armaCuerpo->nombre="Cuerpo de Administración y Aprovisionamiento";
        $armaCuerpo->sigla="CAA";
        $armaCuerpo->save();
    }
}
