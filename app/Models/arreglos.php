<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class arreglos extends Model
{
    use HasFactory;

    protected $table = 'arreglos';

    protected $attributes = [
        'Nombre',
        'Descripcion',
        'Creado_por',
        'Sucursal',
        'Fecha_creacion',
        'Fecha_realizado' => null,
    ];

    protected $fillable = [
        'Nombre',
        'Descripcion',
        'Creado_por',
        'Sucursal',
        'Fecha_creacion',
        'Fecha_realizado',
    ];

    public function Creado_por() {
        return $this->belongsTo(administradores::class, 'Creado_por', 'Cedula');
    }

    public function Sucursal() {
        return $this->belongsTo(sucursales::class, 'Sucursal', 'Nombre');
    }
}
