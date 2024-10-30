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
        'Creado_por' => 0,
        'Empresa_encargada' => '',
        'Personal_encargado' => '',
        'Sucursal' => 0,
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

    public function Creado_por() {
        return $this->belongsTo(User::class, 'Creado_por', 'id');
    }

    public function Sucursal() {
        return $this->belongsTo(sucursales::class, 'Sucursal', 'id');
    }
}
