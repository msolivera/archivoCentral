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
        Schema::create('rol_organizacions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('observacion');
            $table->unsignedInteger('organizacion_id')->nullable();
            $table->unsignedInteger('ficha_Personal_id')->nullable();
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
        Schema::dropIfExists('rol_organizacions');
    }
};
