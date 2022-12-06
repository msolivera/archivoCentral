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
fichas_personales_relacionadas_a_fichas AS 
SELECT FPREL.ficha_id as fichaId, 
		FPREL.ficha_personal_id, 
        FPREL.tipoRelacion, 
        parentescos.nombre as parentesco,
        ficha_personals.primerNombre,
        ficha_personals.segundoNombre,
        ficha_personals.primerApellido,
        ficha_personals.segundoApellido
        
        FROM ficha_personal_relacionadas AS FPREL
	
    LEFT OUTER JOIN parentescos
		ON FPREL.parentesco_id = parentescos.id
	LEFT OUTER JOIN ficha_personals
		ON FPREL.ficha_personal_id = ficha_personals.id
    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS fichas_personales_relacionadas_a_fichas');
    }
};
