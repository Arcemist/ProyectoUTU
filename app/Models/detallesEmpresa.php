<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detallesEmpresa extends Model
{
    //use HasFactory;

    protected $table = 'detalles_empresa';

    public $timestamps = true;

    public $incrementing = false;

    protected $attributes = [
        'Empresa' => 0
    ];

    protected $fillable = [
        'Empresa'
    ];

    public function Es_de() {
        return $this->belongsTo(User::class, 'Empresa', 'id');
    }
}
