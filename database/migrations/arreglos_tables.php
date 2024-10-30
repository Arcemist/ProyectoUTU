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
            $table->bigInteger('Empresa_encargada')->nullable(true);
            $table->string('Personal_encargado')->nullable(true); // Lista de personas encargadas, posiblemente se vuelva un json
            $table->bigInteger('Sucursal');

            $table->date('Created_at');
            $table->date('Updated_at');

            $table->foreign('Creado_por')->references('id')->on('users');
            $table->foreign('Empresa_encargada')->references('id')->on('users');
            $table->foreign('Sucursal')->references('id')->on('sucursales');


        Schema::create('arreglos_historial', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('Descripcion');
            $table->bigInteger('Creado_por');
            $table->bigInteger('Empresa_encargada')->nullable(true);
            $table->string('Personal_encargado')->nullable(true); // Lista de personas encargadas, posiblemente se vuelva un json
            $table->bigInteger('Sucursal');
            $table->date('Fecha_realizado')->nullable(true); // En este caso si es nulo se toma como que se cancelo el arreglo

            $table->date('Created_at');
            $table->date('Updated_at');

            $table->foreign('Creado_por')->references('id')->on('users');
            $table->foreign('Empresa_encargada')->references('id')->on('users');
            $table->foreign('Sucursal')->references('id')->on('sucursales');
        });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arreglos');
        Schema::dropIfExists('historial_arreglos');
    }
};
