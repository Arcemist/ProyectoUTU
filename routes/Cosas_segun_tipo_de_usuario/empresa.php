<?php

use App\Enums\UserType;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Cosas solo pa Empresas
Route::Group([
    'prefix' => 'empresa',
    'middleware' => [
        'auth',
        'verified',
        'CheckUserIs:'.UserType::EMPRESA->value
    ]],
function () {

    Route::get('/eventos', function () {
        return Inertia::render('Empresa/Eventos');
    })->name('empresa.eventos');

});

