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
        Schema::create('arreglos_historial', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('Descripcion');
            $table->json('Creado_por');
            $table->json('Empresa_encargada')->nullable(true);
            $table->string('Personal_encargado')->nullable(true); // Lista de personas encargadas, posiblemente se vuelva un json
            $table->json('Sucursal');
            $table->date('Fecha_realizado')->nullable(true); // En este caso si es nulo se toma como que se cancelo el arreglo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_arreglos');
    }
};
