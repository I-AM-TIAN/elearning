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
}
