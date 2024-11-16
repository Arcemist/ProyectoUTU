<?php

use App\Enums\UserType;
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
        /*
        *   Por ahora solo serviria para administradores.
        *   Porque los otros tipos requeririan mas datos.
        */
        Schema::create('solicitudes_de_registro', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->enum('user_type', [
                UserType::ADMINISTRADOR->value,
                UserType::GUARDIA->value,
                UserType::EMPRESA->value,
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes_de_registro');
    }
};
