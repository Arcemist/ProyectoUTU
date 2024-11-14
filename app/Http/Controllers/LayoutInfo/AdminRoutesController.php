<?php

namespace App\Http\Controllers\LayoutInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class AdminRoutesController extends Controller
{
    /**
     * Pasa las rutas del Administrador
     */
    public function show(Request $request): Array
    {
        return [[
            'ruta' => 'dashboard',
            'nombre' => 'dashboard'
        ],[
            'ruta' => 'intento',
            'nombre' => 'intento'
        ],[
            'ruta' => 'administrador.calendario',
            'nombre' => 'calendario administrador'
        ],[
            'ruta' => 'administrador.usuarios_registrados',
            'nombre' => 'usuarios registrados'
        ],[
            'ruta' => 'administrador.solicitudes_de_registro',
            'nombre' => 'solicitudes de registro'
        ]];
    }
}
