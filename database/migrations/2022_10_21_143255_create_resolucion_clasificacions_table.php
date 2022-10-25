<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resolucion_clasificacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('ficha_Id');
            $table->string('tipo');
            $table->string('fechaReclasificacion');
            $table->string('nombreResolucion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resolucion_clasificacions');
    }
};
