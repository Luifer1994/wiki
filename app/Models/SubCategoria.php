<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'user_creacion',
        'user_actualizacion',
        'id_categoria'
    ];
}
