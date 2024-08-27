<?php

namespace App\Filament\Resources\ModuloResource\Pages;

use App\Filament\Resources\ModuloResource;
use App\Models\Curso;
use App\Models\Modulo;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateModulo extends CreateRecord
{
    protected static string $resource = ModuloResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $curso = Curso::find($data['id_curso']);

        // Crear el corporativo sin 'ubicacion_id' primero
        $modulo = Modulo::create(array_merge($data, ['id_curso' => $curso->id]));

        return $modulo;
    }
}
