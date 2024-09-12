<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Modulo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_curso',
        'nombre',
        'descripcion',
        'orden'
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

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso');
    }

    public function lecciones()
    {
        return $this->hasMany(Leccion::class, 'id_modulo');
    }
}
