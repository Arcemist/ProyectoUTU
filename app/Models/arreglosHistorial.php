<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class arreglosHistorial extends Model
{
    use HasFactory;

    protected $table = 'arreglos_historial';

    public $timestamps = true;

    protected $attributes = [
        'Nombre' => '',
        'Descripcion' => '',
        'Creado_por' => [],
        'Empresa_encargada' => [],
        'Personal_encargado' => '',
        'Sucursal' => [],
        'Fecha_realizado' => ''
    ];

    protected $fillable = [
        'Nombre',
        'Descripcion',
        'Creado_por',
        'Empresa_encargada',
        'Personal_encargado',
        'Sucursal',
        'Fecha_realizado'
    ];

    protected $casts = [
        'Creado_por' => 'array',
        'Empresa_encargada' => 'array',
        'Sucursal' => 'array'
    ];

}
