<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FichaPersonal;

class FichaPersonalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FichaPersonal::truncate();
        $persona = new FichaPersonal();
        $persona->cedula = 111111111;
        $persona->otroDocNombre = 'dni';
        $persona->otroDocNumero = 1234;
        $persona->primerNombre = 'micaela';
        $persona->segundoNombre = 'stephanie';
        $persona->primerApellido = 'olivera';
        $persona->segundoApellido = 'cardozo';
        $persona->credencial = 'bdb 78987';
        $persona->sexo = 'Hombre';
        $persona->fechaNac = '25/05/2022';
        $persona->fechaDef = '25/05/3022';
        $persona->correoElectronico = 'correo@micaela.com';
        $persona->seccionalPolicial = 12;
        $persona->pais_id = 1;
        $persona->ciudad_id = 1;
        $persona->departamentos_id = 1;
        $persona->estadoCivil_id = 1;
        $persona->situacion_id = 1;
        $persona->fuerza_id = 1;
        $persona->grado_id = 1;
        $persona->cuerpo_id = 1;
        $persona->clasificacion_id = 1;
        $persona->numeroPaquete = 11;
        $persona->estadoIngreso = 'No Aplica';
        $persona->save();
        
        $persona = new FichaPersonal();
        $persona->cedula = 4596553;
        $persona->primerNombre = 'federico';
        $persona->primerApellido = 'alonso';
        $persona->pais_id = 1;
        $persona->save();
        
        $persona = new FichaPersonal();
        $persona->cedula = 8795664;
        $persona->primerNombre = 'cristian';
        $persona->primerApellido = 'palma';
        $persona->pais_id = 1;
        $persona->save();
        
        $persona = new FichaPersonal();
        $persona->cedula = 42165332;
        $persona->primerNombre = 'marcelo';
        $persona->primerApellido = 'olivera';
        $persona->pais_id = 1;
        $persona->save();
    }
}
