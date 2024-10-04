<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documentos extends Model
{
    use HasFactory;

    protected $table = 'documentos';

    protected $attributes = [
        'Pertenece_a',
        'Archivo',
    ];

    protected $fillable = [
        'Pertenece_a',
        'Archivo',
    ];

    public function Pertenece_a() {
        return $this->belongsTo(user::class, 'Pertenece_a', 'id');
    }
}
