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
        fichas_impersonales_relacionada_a_impersonales AS 
        select  FIMPER.nombre,
                C.nombre AS nombreClasificacion,
                FIMPERREL.tipoRelacion,
                FIMPERREL.ficha_id        
                FROM ficha_impersonals AS FIMPER
                
        LEFT OUTER JOIN ficha_impersonal_relacionadas AS FIMPERREL
            ON FIMPER.id = FIMPERREL.ficha_impersonal_id
        LEFT OUTER JOIN clasificacions AS C
            ON FIMPER.clasificacion_id = C.id
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
