<?php

namespace App\Filament\Resources\LeccionResource\Pages;

use App\Filament\Resources\LeccionResource;
use App\Models\Leccion;
use App\Models\Modulo;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateLeccion extends CreateRecord
{
    protected static string $resource = LeccionResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $modulo = Modulo::find($data['id_modulo']);

        // Crear el corporativo sin 'ubicacion_id' primero
        $leccion = Leccion::create(array_merge($data, ['id_modulo' => $modulo->id]));

        return $leccion;
    }
}
