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
            $table->unsignedInteger('pais_id')->nullable();
            $table->unsignedInteger('ciudad_id')->nullable();
            $table->unsignedInteger('departamentos_id')->nullable();
            $table->unsignedInteger('estadoCivil_id')->nullable();
            $table->unsignedInteger('situacion_id')->nullable();
            $table->unsignedInteger('fuerza_id')->nullable();
            $table->unsignedInteger('grado_id')->nullable();
            $table->unsignedInteger('cuerpo_id')->nullable();
            $table->unsignedInteger('clasificacion_id')->nullable();
            $table->integer('numeroPaquete')->nullable();
            $table->string('estadoIngreso')->nullable();
            $table->string('fotoTim')->default('user.png');
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
        Schema::dropIfExists('ficha_personals');
    }
};
