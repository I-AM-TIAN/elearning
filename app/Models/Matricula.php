<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_usuario',
        'id_curso',
        'progreso',
        'fecha_finalizacion'
    ];
}
