<?php

namespace App\Models;

use CloudinaryLabs\CloudinaryLaravel\MediaAlly;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use function PHPUnit\Framework\isEmpty;

class Curso extends Model
{
    use HasFactory;
    use MediaAlly;

    protected $fillable = [
        'nombre',
        'descripcion',
        'id_estado',
        'icono'
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = Str::uuid()->toString();
            }
        });
    }

    public function modulos()
    {
        return $this->hasMany(Modulo::class, 'id_curso');
    }

    public function calcularProgreso()
    {
        $totalLecciones = 0;
        $leccionesCompletadas = 0;

        // Obtener los módulos asociados al curso
        $modulos = $this->modulos;
        if ($modulos) {
            foreach ($modulos as $modulo) {
                $totalLecciones += $modulo->lecciones->count();
                $leccionesCompletadas += $modulo->lecciones->where('visto', true)->count();
            }
        }

        return $totalLecciones > 0 ? ($leccionesCompletadas / $totalLecciones) * 100 : 0;
    }

    public function actualizarProgreso()
    {
        $this->progreso = $this->calcularProgreso();
        $this->save();
    }
}
