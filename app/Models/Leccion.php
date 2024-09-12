<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leccion extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_modulo',
        'nombre',
        'descripcion',
        'video',
        'orden',
    ];

    public function tipoLeccion()
    {
        return $this->belongsTo(Tipo_Leccion::class);
    }

    public function modulo()
    {
        return $this->belongsTo(Modulo::class, 'id_modulo');
    }
}
