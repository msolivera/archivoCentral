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
        Schema::create('ficha_personal_relacionadas', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('ficha_personal_id')->default(0);
            $table->unsignedInteger('ficha_impersonal_id')->default(0);
            $table->unsignedInteger('dossier_id')->default(0);
            $table->unsignedInteger('documento_id')->default(0);
            $table->unsignedInteger('ficha_per_relacionada_id');
            $table->unsignedInteger('parentesco_id')->default(0);
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
        Schema::dropIfExists('ficha_personal_relacionadas');
    }
};
