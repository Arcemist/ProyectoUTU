<?php

namespace App\Http\Controllers\Layoutinfo;

use app\http\controllers\Controller;
use illuminate\http\Redirectresponse;
use illuminate\http\Request;
use illuminate\support\facades\Auth;
use illuminate\support\facades\Redirect;
use inertia\Inertia;
use inertia\Response;

class EnterpriseRoutesController extends Controller
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
            'ruta' => 'empresa.eventos',
            'nombre' => 'intento'
        ]];
    }
}
