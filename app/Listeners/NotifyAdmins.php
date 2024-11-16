<?php

namespace App\Listeners;

use App\Enums\NotificationType;
use App\Models\SolicitudDeRegistro;
use App\Models\NotificacionAdministrador;
use App\Events\AdminRegistrationAttempt;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAdmins
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AdminRegistrationAttempt $event): void
    {

        $usuario = $event->user;

        SolicitudDeRegistro::create([
            'name' => $usuario->name,
            'email' => $usuario->email,
            'password' => $usuario->password,
            'user_type' => $usuario->user_type
        ]);

        NotificacionAdministrador::create([
            'Nombre' => 'Solicitud de registro',
            'Descripcion' => $usuario->name.' intento registrarse como administrador',
            'Ruta' => 'administrador.solicitudes_de_registro',
            'Tipo' => NotificationType::SOLICITUD_DE_REGISTRO->value
        ]);
    }
}
