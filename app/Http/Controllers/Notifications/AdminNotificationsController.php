<?php

namespace App\Http\Controllers\Notifications;

use App\Models\NotificacionAdministrador;
use app\http\controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class AdminNotificationsController extends Controller
{

    public function show(Request $request): array
    {
        $notificaciones = NotificacionAdministrador::all()->toArray();

        if ($notificaciones != null) {
            return $notificaciones;
        } else {
            return ['No hay'];
        }
    }

    /**
     * Borra la notificacion
     */
    public function destroy(Request $request): RedirectResponse
    {
    }
}
