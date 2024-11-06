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
        Schema::create('detalles_administrador', function (Blueprint $table) {
            $table->bigInteger('Administrador')->unique();
            $table->timestamps();
            //Espacio pa la info

            $table->foreign('Administrador')->references('id')->on('usuario');
        });

        Schema::create('detalles_empresa', function (Blueprint $table) {
            $table->bigInteger('Empresa')->unique();
            $table->timestamps();
            //Espacio pa la info

            $table->foreign('Empresa')->references('id')->on('usuario');
        });

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
        Schema::dropIfExists('detalles_administrador');
        Schema::dropIfExists('detalles_empresa');
        Schema::dropIfExists('detalles_guardia');
    }
};
