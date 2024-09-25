<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $table = 'inscripciones';

    protected $fillable = [
        'usuario_id',
        'curso_id',
        'modulo_id',
        'completado'
    ];

    // Relación con Modulo: una inscripción pertenece a un módulo
    public function modulo()
    {
        return $this->belongsTo(Modulo::class, 'modulo_id');
    }

    // Relación con Usuario: una inscripción pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
