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
            $table->string('PrimerNombre');
            $table->string('PrimerApellido');
            $table->unsignedInteger('paisId')->nullable();
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
