<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudDeRegistro extends Model
{
    use HasFactory;

    protected $table = 'solicitudes_de_registro';

    public $timestamps = true;

    protected $attributes = [
        'name' => '',
        'email' => '',
        'password' => '',
        'user_type' => ''
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type'
    ];
}
