<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
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
        'Creado_por' => '',
        'Empresa_encargada' => '',
        'Personal_encargado' => '',
        'Sucursal' => '',
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

    protected function casts(): array
    {
        $tipo = AsArrayObject::class;
        return [
            'Creado_por' => $tipo,
            'Empresa_encargada' => $tipo,
            'Sucursal' => $tipo
        ];
    }

}
