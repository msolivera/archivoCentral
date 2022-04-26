<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Parentesco;

class ParentescoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Parentesco::truncate();
        
        $madre = new Parentesco;
        $madre->nombre = 'Madre';
        $madre->save();

        $padre = new Parentesco;
        $padre->nombre = 'Padre';
        $padre->save();

        $abuelo = new Parentesco;
        $abuelo->nombre = 'Abuelo';
        $abuelo->save();

        $abuela = new Parentesco;
        $abuela->nombre = 'Abuela';
        $abuela->save();

        $hermano = new Parentesco;
        $hermano->nombre = 'Hermano';
        $hermano->save();

        $hermana = new Parentesco;
        $hermana->nombre = 'Hermana';
        $hermana->save();

        $hijo = new Parentesco;
        $hijo->nombre = 'Hijo';
        $hijo->save();

        $hija = new Parentesco;
        $hija->nombre = 'Hija';
        $hija->save();

        $suegro = new Parentesco;
        $suegro->nombre = 'Suegro';
        $suegro->save();

        $suegra = new Parentesco;
        $suegra->nombre = 'Suegra';
        $suegra->save();

        $yerno = new Parentesco;
        $yerno->nombre = 'Yerno';
        $yerno->save();

        $nuera = new Parentesco;
        $nuera->nombre = 'Nuera';
        $nuera->save();

        $cunado = new Parentesco;
        $cunado->nombre = 'Cuñado';
        $cunado->save();

        $cunada = new Parentesco;
        $cunada->nombre = 'Cuñada';
        $cunada->save();

        $tio = new Parentesco;
        $tio->nombre = 'Tio';
        $tio->save();

        $tia = new Parentesco;
        $tia->nombre = 'Tia';
        $tia->save();

        $sobrino = new Parentesco;
        $sobrino->nombre = 'Sobrino';
        $sobrino->save();

        $sobrina = new Parentesco;
        $sobrina->nombre = 'Sobrina';
        $sobrina->save();

        $bisabuelo = new Parentesco;
        $bisabuelo->nombre = 'Bisabuelo';
        $bisabuelo->save();

        $bisabuela = new Parentesco;
        $bisabuela->nombre = 'Bisabuela';
        $bisabuela->save();

        $otro = new Parentesco;
        $otro->nombre = 'Otro';
        $otro->save();


        $conyuge_concubino_novio = new Parentesco;
        $conyuge_concubino_novio->nombre = 'Conyuge, Concubino/a, Novio/a';
        $conyuge_concubino_novio->save();

        $referente = new Parentesco;
        $referente->nombre = 'Referente';
        $referente->save();

        $tutor = new Parentesco;
        $tutor->nombre = 'Tutor';
        $tutor->save();

        $tutorLegal = new Parentesco;
        $tutorLegal->nombre = 'Tutor Legal';
        $tutorLegal->save();

    }
}
