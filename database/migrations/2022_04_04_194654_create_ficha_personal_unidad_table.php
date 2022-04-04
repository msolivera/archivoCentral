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
        Schema::create('fichaPersonal_unidad', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('fichaPersonal_Id');
            $table->unsignedInteger('unidad_Id');
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
        Schema::dropIfExists('fichaPersonal_unidad');
    }
};
