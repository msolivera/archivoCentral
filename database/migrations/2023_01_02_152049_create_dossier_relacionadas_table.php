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
        Schema::create('dossier_relacionadas', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('ficha_id');
            $table->unsignedInteger('dossier_id');
            $table->string('tipoRelacion');
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
        Schema::dropIfExists('dossier_relacionadas');
    }
};
