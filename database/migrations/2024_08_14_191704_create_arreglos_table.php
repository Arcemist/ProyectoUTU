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
        Schema::create('arreglos', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('Descripcion');
            $table->integer('Creado_por');
            $table->string('Sucursal');
            $table->date('Fecha_creacion');
            $table->date('Fecha_realizado')->nullable(true);

            $table->foreign('Creado_por')->references('Cedula')->on('Administradores');
            $table->foreign('Sucursal')->references('Nombre')->on('Sucursales');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arreglos');
    }
};
