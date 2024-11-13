<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notificaciones extends Model
{
    use HasFactory;

    protected $table = 'notificaciones';

    public $timestamps = false;

    protected $attributes = [
        'Nombre' => '',
        'Descripcion' => '',
        'Pertenece_a' => 0,
    ];

    protected $fillable = [
        'Nombre',
        'Descripcion',
        'Pertenece_a',
    ];

    public function Pertenece_a() {
        return $this->belongsTo(User::class, 'Pertenece_a', 'id');
    }
}
