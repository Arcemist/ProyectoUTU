<?php

namespace App\Http\Controllers\Layoutinfo;

use app\http\controllers\Controller;
use illuminate\http\Redirectresponse;
use illuminate\http\Request;
use illuminate\support\facades\Auth;
use illuminate\support\facades\Redirect;
use inertia\Inertia;
use inertia\Response;

class GuardRoutesController extends Controller
{
    /**
     * pasa las rutas del administrador
     */
    public function show(request $request): array
    {
        return [[
            'ruta' => 'dashboard',
            'nombre' => 'Dashboard'
        ],[
            'ruta' => 'guardia.eventos',
            'nombre' => 'Eventos'
        ]];
    }
}
