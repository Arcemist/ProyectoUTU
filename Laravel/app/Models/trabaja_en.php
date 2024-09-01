<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trabaja_en extends Model
{
    use HasFactory;

    protected $table = 'trabaja_en';

    protected $fillable = [
        'Cedula_guardia',
        'Nombre_sucursal',
    ];

    protected function Cedula_guardia() {
        return $this->belongsTo(guardias::class, 'Cedula_guardia', 'Cedula');
    }
    protected function Nombre_sucursal() {
        return $this->belongsTo(sucursales::class, 'Nombre_sucursal', 'Nombre');
    }
}
