<?php

use App\Enums\UserType;
use Illuminate\Support\Facades\Route;

// Cosas solo pa Empresas
Route::middleware([
    'auth',
    'verified',
    'CheckUserIs:'.UserType::EMPRESA->value
])->group(function () {

});

