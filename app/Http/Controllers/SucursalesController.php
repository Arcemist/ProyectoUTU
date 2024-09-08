<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\sucursales;
use Inertia\Response;
use App\Enums\Estado_solicitud;

class SucursalesController extends Controller
{
    public function show(): Response {
        return sucursales::all();
    }
}
