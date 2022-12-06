<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW 
fichas_personales_reporte AS 
SELECT FPER.id as fichaId, 
		FPER.cedula, 
        FPER.primerNombre, 
        FPER.primerApellido, 
        FPER.segundoNombre,
        FPER.segundoApellido,
        FPER.fechaNac,
        FPER.fechaDef,
        FPER.credencial,
        FPER.sexo,
        FPER.correoElectronico,
        FPER.seccionalPolicial,
        FPER.estadoIngreso,
        FPER.numeroPaquete,
        FPER.otroDocNombre,
        FPER.otroDocNumero,
        pais.nombre as paisNombre,
        ciudads.nombre as ciudadNombre,
        departamentos.nombre as departamentoNombre,
        estado_civils.nombre as estadoCivilNombre,
        situacions.nombre as situacionNombre,
        fuerzas.nombre as fuerzaNombre,
        grados.nombre as gradoNombre,
        grados.sigla as gradoSigla,
        arma_cuerpos.nombre as cuerpoNombre,
        arma_cuerpos.sigla as cuerpoSigla,
        clasificacions.nombre as clasificacionNombre
        
        FROM ficha_personals AS FPER
	
    LEFT OUTER JOIN pais
		ON FPER.pais_id = pais.id
	LEFT OUTER JOIN ciudads
		ON FPER.ciudad_id = ciudads.id
	LEFT OUTER JOIN departamentos
		ON FPER.departamentos_id = departamentos.id
	LEFT OUTER JOIN estado_civils
		ON FPER.estadoCivil_id = estado_civils.id
	LEFT OUTER JOIN situacions
		ON FPER.situacion_id = situacions.id
	LEFT OUTER JOIN fuerzas
		ON FPER.fuerza_id = fuerzas.id
	LEFT OUTER JOIN grados
		ON FPER.grado_id = grados.id
	LEFT OUTER JOIN arma_cuerpos
		ON FPER.cuerpo_id = arma_cuerpos.id
	LEFT OUTER JOIN clasificacions
		ON FPER.clasificacion_id = clasificacions.id
    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS fichas_impersonales_relacionada_a_impersonales');
    }
};
