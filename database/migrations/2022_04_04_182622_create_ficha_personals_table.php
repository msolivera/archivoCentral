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
        Schema::create('ficha_personals', function (Blueprint $table) {
            $table->id();
            $table->integer('cedula')->nullable();
            $table->string('otroDocNombre')->nullable();
            $table->integer('otroDocNumero')->nullable();
            $table->string('primerNombre')->nullable();
            $table->string('segundoNombre')->nullable();
            $table->string('primerApellido')->nullable();
            $table->string('segundoApellido')->nullable();
            $table->string('fechaNac')->nullable();
            $table->string('fechaDef')->nullable();
            $table->string('credencial')->nullable();
            $table->string('sexo')->nullable();
            $table->string('correoElectronico')->nullable();
            $table->string('seccionalPolicial')->nullable();
            $table->unsignedInteger('paisId')->nullable();
            $table->unsignedInteger('ciudadId')->nullable();
            $table->unsignedInteger('departamentoId')->nullable();
            $table->unsignedInteger('estadoCivilId')->nullable();
            $table->unsignedInteger('situacionId')->nullable();
            $table->unsignedInteger('fuerzaId')->nullable();
            $table->unsignedInteger('gradoId')->nullable();
            $table->unsignedInteger('cuerpoId')->nullable();
            $table->unsignedInteger('clasificacionId')->nullable();
            $table->integer('numeroPaquete')->nullable();
            $table->string('estadoIngreso')->nullable();
            $table->string('fotoTim')->default('user.png');


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
        Schema::dropIfExists('ficha_personals');
    }
};
