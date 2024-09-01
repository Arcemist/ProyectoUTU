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
        Schema::create('trabajadores_terciarizados', function (Blueprint $table) {
            $table->integer('Cedula')->primary();
            $table->string('Nombre');
            $table->integer('Trabaja_en');

            $table->foreign('Trabaja_en')->references('RUT')->on('empresas_terciarizadas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajadores_terciarizados');
    }
};
