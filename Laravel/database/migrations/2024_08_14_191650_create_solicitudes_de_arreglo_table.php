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
        Schema::create('solicitudes_de_arreglo', function (Blueprint $table) {
            $table->id();
            $table->integer('Creada_por');
            $table->integer('Solicita_arreglar');
            $table->enum('Estado', ['Rechazado', 'Aceptado'])->nullable(true);
            $table->integer('Aprobada_por')->nullable(true);

            $table->foreign('Creada_por')->references('RUT')->on('empresas_terciarizadas');
            $table->foreign('Solicita_arreglar')->references('id')->on('Arreglos');
            $table->foreign('Aprobada_por')->references('Cedula')->on('Administradores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes_de_arreglo');
    }
};
