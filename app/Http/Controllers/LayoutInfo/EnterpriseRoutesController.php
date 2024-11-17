<?php

namespace App\Http\Controllers\LayoutInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Redirectresponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

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
