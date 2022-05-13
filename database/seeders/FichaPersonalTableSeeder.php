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
        $persona->otroDocNombre = 'DNI';
        $persona->otroDocNumero = 1234;
        $persona->primerNombre = 'micaela';
        $persona->segundoNombre = 'stephanie';
        $persona->primerApellido = 'olivera';
        $persona->segundoApellido = 'cardozo';
        $persona->credencial = 'bdb 78987';
        $persona->sexo = 'Mujer';
        $persona->fechaNac = '25/05/2022';
        $persona->fechaDef = '25/05/3022';
        $persona->correoElectronico = 'correo@micaela.com';
        $persona->seccionalPolicial = 12;
        $persona->paisId = 1;
        $persona->ciudadId = 1;
        $persona->departamentoId = 1;
        $persona->estadoCivilId = 1;
        $persona->situacionId = 1;
        $persona->fuerzaId = 1;
        $persona->gradoId = 1;
        $persona->cuerpoId = 1;
        $persona->clasificacionId = 1;
        $persona->numeroPaquete = 11;
        $persona->estadoIngreso = 'No Aplica';
        $persona->save();
        
        $persona = new FichaPersonal();
        $persona->cedula = 4596553;
        $persona->primerNombre = 'federico';
        $persona->primerApellido = 'alonso';
        $persona->paisId = 1;
        $persona->save();
        
        $persona = new FichaPersonal();
        $persona->cedula = 8795664;
        $persona->primerNombre = 'cristian';
        $persona->primerApellido = 'palma';
        $persona->paisId = 1;
        $persona->save();
        
        $persona = new FichaPersonal();
        $persona->cedula = 42165332;
        $persona->primerNombre = 'marcelo';
        $persona->primerApellido = 'olivera';
        $persona->paisId = 1;
        $persona->save();
    }
}
