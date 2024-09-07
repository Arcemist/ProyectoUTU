<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class solicitudes_de_arreglo extends Model
{
    use HasFactory;

    protected $table = 'solicitudes_de_arreglo';

    protected $attributes = [
        'Creada_por',
        'Solicita_arreglar',
        'Estado' => null,
        'Personal_asignado',
        'Aprobada_por' => null
    ];

    protected $fillable = [
        'Creada_por',
        'Solicita_arreglar',
        'Estado',
        'Personal_asignado',
        'Aprobada_por'
    ];

    public function Creada_por() {
        return $this->belongsTo(empresas_terciarizadas::class, 'Creada_por', 'RUT');
    }
    public function Solicita_arreglar() {
        return $this->belongsTo(arreglos::class, 'Solicita_arreglar');
    }
    public function Aprobada_por() {
        return $this->belongsTo(administradores::class, 'Aprobada_por', 'Cedula');
    }
}
