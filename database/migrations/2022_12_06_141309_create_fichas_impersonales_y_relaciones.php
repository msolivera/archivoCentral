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
fichas_impersonales_y_relaciones AS 
select FIMPER.id, 
        FIMPER.nombre AS nombreFicha,
        IMPER_REL.ficha_id,
        IMPER_REL.ficha_impersonal_id,
        IMPER_REL.tipoRelacion,
        FIMPER.clasificacion_id,
        C.nombre AS nombreClasificacion,
        FIPER.cedula,
        FIPER.primerNombre,
        FIPER.primerApellido
        from ficha_impersonals AS FIMPER
INNER JOIN ficha_impersonal_relacionadas AS IMPER_REL
ON FIMPER.id = IMPER_REL.ficha_impersonal_id
Inner join ficha_personals AS FIPER
on IMPER_REL.ficha_id = FIPER.id
Inner join clasificacions AS C
on FIMPER.clasificacion_id = C.id
    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS fichas_impersonales_y_relaciones');
    }
};
