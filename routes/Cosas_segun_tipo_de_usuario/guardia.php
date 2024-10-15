<?php

use App\Enums\UserType;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Cosas solo pa Guardias
Route::middleware([
    'auth',
    'verified',
    'CheckUserIs:'.UserType::GUARDIA->value
])->group(function () {
    Route::get('/guardia', function () {
        return Inertia::render('Guardia');
    });
});

