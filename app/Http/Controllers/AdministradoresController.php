<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\administradores;

class AdministradoresController extends Controller
{
    // esperando el midleware pa esto
    public function show() {
        return administradores::all();
    }
}
