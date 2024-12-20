<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class arreglos extends Model
{
    use HasFactory;

    protected $table = 'arreglos';

    public $timestamps = true;

    protected $attributes = [
        'Nombre' => '',
        'Descripcion' => '',
        'Creado_por' => 0,
        'Empresa_encargada' => '',
        'Personal_encargado' => '',
        'Sucursal' => 0
    ];

    protected $fillable = [
        'Nombre',
        'Descripcion',
        'Creado_por',
        'Empresa_encargada',
        'Personal_encargado',
        'Sucursal'
    ];

    public function Creado_por() {
        return $this->belongsTo(User::class, 'Creado_por', 'id');
    }

    public function Sucursal() {
        return $this->belongsTo(sucursales::class, 'Sucursal', 'id');
    }
}
