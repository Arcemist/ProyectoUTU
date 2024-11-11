<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalles_guardia', function (Blueprint $table) {
            $table->bigInteger('Guardia')->unique();
            $table->timestamps();
            $table->string('Trabaja_en'); //array de sucursales en las que trabaja

            $table->foreign('Guardia')->references('id')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_guardia');
    }
};
