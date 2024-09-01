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
        Schema::create('trabaja_en', function (Blueprint $table) {
            $table->integer('Cedula_guardia');
            $table->string('Nombre_sucursal');

            $table->primary(['Cedula_guardia', 'Nombre_sucursal']);

            $table->foreign('Cedula_guardia')->references('Cedula')->on('guardias');
            $table->foreign('Nombre_sucursal')->references('Nombre')->on('sucursales');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabaja_en');
    }
};
