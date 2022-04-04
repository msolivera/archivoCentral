<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pariente;

class ParienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Pariente::truncate();
        
        $madre = new Pariente;
        $madre->nombre = 'Madre';
        $madre->save();

        $padre = new Pariente;
        $padre->nombre = 'Padre';
        $padre->save();

        $abuelo = new Pariente;
        $abuelo->nombre = 'Abuelo';
        $abuelo->save();

        $abuela = new Pariente;
        $abuela->nombre = 'Abuela';
        $abuela->save();

        $hermano = new Pariente;
        $hermano->nombre = 'Hermano';
        $hermano->save();

        $hermana = new Pariente;
        $hermana->nombre = 'Hermana';
        $hermana->save();

        $hijo = new Pariente;
        $hijo->nombre = 'Hijo';
        $hijo->save();

        $hija = new Pariente;
        $hija->nombre = 'Hija';
        $hija->save();

        $suegro = new Pariente;
        $suegro->nombre = 'Suegro';
        $suegro->save();

        $suegra = new Pariente;
        $suegra->nombre = 'Suegra';
        $suegra->save();

        $yerno = new Pariente;
        $yerno->nombre = 'Yerno';
        $yerno->save();

        $nuera = new Pariente;
        $nuera->nombre = 'Nuera';
        $nuera->save();

        $cunado = new Pariente;
        $cunado->nombre = 'Cuñado';
        $cunado->save();

        $cunada = new Pariente;
        $cunada->nombre = 'Cuñada';
        $cunada->save();

        $tio = new Pariente;
        $tio->nombre = 'Tio';
        $tio->save();

        $tia = new Pariente;
        $tia->nombre = 'Tia';
        $tia->save();

        $sobrino = new Pariente;
        $sobrino->nombre = 'Sobrino';
        $sobrino->save();

        $sobrina = new Pariente;
        $sobrina->nombre = 'Sobrina';
        $sobrina->save();

        $bisabuelo = new Pariente;
        $bisabuelo->nombre = 'Bisabuelo';
        $bisabuelo->save();

        $bisabuela = new Pariente;
        $bisabuela->nombre = 'Bisabuela';
        $bisabuela->save();

        $otro = new Pariente;
        $otro->nombre = 'Otro';
        $otro->save();


        $conyuge_concubino_novio = new Pariente;
        $conyuge_concubino_novio->nombre = 'Conyuge, Concubino/a, Novio/a';
        $conyuge_concubino_novio->save();

        $referente = new Pariente;
        $referente->nombre = 'Referente';
        $referente->save();

        $tutor = new Pariente;
        $tutor->nombre = 'Tutor';
        $tutor->save();

        $tutorLegal = new Pariente;
        $tutorLegal->nombre = 'Tutor Legal';
        $tutorLegal->save();

    }
}
