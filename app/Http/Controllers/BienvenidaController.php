<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class BienvenidaController extends Controller
{
    /**
     * Muestra la pagina de bienvenida indicada
     */
    public function show(Request $request): Response
    {
        switch ($request->user()->user_type) {
            case UserType::ADMINISTRADOR->value:
                return Inertia::render('Bienvenidas/Administrador');
                break;

            case UserType::EMPRESA->value:
                return Inertia::render('Bienvenidas/Empresa');
                break;

            case UserType::GUARDIA->value:
                return Inertia::render('Bienvenidas/Guardia');
                break;

            default:
                throw new Exception("Usuario sin tipo o con tipo incorrecto llego a la pagina de bienvenida", 1);
                break;
        }
    }
}
