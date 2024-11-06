<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documentos extends Model
{
    use HasFactory;

    protected $table = 'documentos';

    public $timestamps = true;

    protected $attributes = [
        'Subido_por' => 1,
        'Ruta' => '',
    ];

    protected $fillable = [
        'Subido_por',
        'Ruta',
    ];

    public function Pertenece_a() {
        return $this->belongsTo(User::class, 'Subido_por', 'id');
    }
}
