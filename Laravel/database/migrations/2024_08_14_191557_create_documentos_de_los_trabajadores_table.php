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
        Schema::create('documentos_de_los_trabajadores', function (Blueprint $table) {
            $table->id();
            $table->integer('Pertenece_a');
            $table->binary('Archivo');

            $table->foreign('Pertenece_a')->references('Cedula')->on('trabajadores_terciarizados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos_de_los_trabajadores');
    }
};