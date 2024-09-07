<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class solicitudes_de_arreglo extends Model
{
    use HasFactory;

    protected $table = 'solicitudes_de_arreglo';

    protected $fillable = [
        'Creada_por',
        'Solicita_arreglar',
        'Estado' => null,
        'Personal_asignado',
        'Aprobada_por' => null
    ];

    protected function Creada_por() {
        return $this->belongsTo(empresas_terciarizadas::class, 'Creada_por', 'RUT');
    }
    protected function Solicita_arreglar() {
        return $this->belongsTo(arreglos::class, 'Solicita_arreglar');
    }
    protected function Aprobada_por() {
        return $this->belongsTo(administradores::class, 'Aprobada_por', 'Cedula');
    }
}
