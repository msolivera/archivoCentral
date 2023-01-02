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
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->char('letra',1);
            $table->longText('resumen');
            $table->unsignedInteger('ubicacion_id')->default(0);
            $table->unsignedInteger('serie_documental_id')->default(0);
            $table->unsignedInteger('clasificacions_id')->default(0);
            $table->string('fechaInicio')->nullable();
            $table->string('fechaFin')->nullable();
            $table->string('tipo')->nullable();
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
        Schema::dropIfExists('dossiers');
    }
};
