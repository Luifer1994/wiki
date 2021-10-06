<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulos extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'contenido',
        'id_sub_categoria',
        'user_creacion',
        'user_actualizacion'
    ];
}