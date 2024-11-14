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
        Schema::create('notificaciones_guardia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Pertenece_a');

            $table->string('Nombre');
            $table->string('Descripcion');
            $table->string('Ruta');

            $table->foreign('Pertenece_a')->references('id')->on('sucursales');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificaciones_guardia');
    }
};
