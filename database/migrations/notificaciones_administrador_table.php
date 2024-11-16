
<?php

use App\Enums\NotificationType;
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
        Schema::create('notificaciones_administrador', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('Nombre');
            $table->string('Descripcion');
            $table->string('Ruta');
            $table->enum('Tipo', [
                NotificationType::SOLICITUD_DE_REGISTRO->value,
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificaciones_administrador');
    }
};
