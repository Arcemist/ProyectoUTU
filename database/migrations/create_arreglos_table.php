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
            $table->bigInteger('Creado_por');
            $table->bigInteger('Empresa_encargada');
            $table->bigInteger('Sucursal');
            $table->date('Fecha_creacion');
            $table->date('Fecha_realizado')->nullable(true);

            // Capaz que combiene refenrenciar el Email en vez de el Nombre
            $table->foreign('Creado_por')->references('id')->on('users');
            $table->foreign('Empresa_encargada')->references('id')->on('users');
            $table->foreign('Sucursal')->references('id')->on('sucursales');
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
