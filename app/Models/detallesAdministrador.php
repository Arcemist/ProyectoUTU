<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detallesAdministrador extends Model
{
    //use HasFactory;

    protected $table = 'detalles_administrador';

    public $timestamps = true;

    public $incrementing = false;

    protected $attributes = [
        'Administrador' => 0
    ];

    protected $fillable = [
        'Administrador'
    ];

    public function Es_de() {
        return $this->belongsTo(User::class, 'Administrador', 'id');
    }
}
