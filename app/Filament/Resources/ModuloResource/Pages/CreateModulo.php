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
        // Iterar sobre los módulos dentro del repeater
        foreach ($data['modulos'] as $moduloData) {
            // Buscar el curso usando el id_curso dentro de cada módulo
            $curso = Curso::find($moduloData['id_curso']);

            // Crear el módulo, asignando el id_curso correctamente
            Modulo::create(array_merge($moduloData, ['id_curso' => $curso->id]));
        }

        // Si estás creando más que los módulos (e.g. un curso principal), puedes devolver ese registro
        return new Modulo();  // Devuelve lo que sea necesario aquí
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // Redirige a la lista de módulos después de la creación
    }
}
