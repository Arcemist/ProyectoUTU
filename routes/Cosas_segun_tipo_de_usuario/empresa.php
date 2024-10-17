<?php

use App\Enums\UserType;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/empresa', function () {
    return Inertia::render('Empresa');
});

// Cosas solo pa Empresas
Route::middleware([
    'auth',
    'verified',
    'CheckUserIs:'.UserType::EMPRESA->value
])->group(function () {

});

