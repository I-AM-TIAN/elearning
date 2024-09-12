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
        foreach ($data['modulos'] as $moduloData) {
            $curso = Curso::find($moduloData['id_curso']);

            Modulo::create(array_merge($moduloData, ['id_curso' => $curso->id]));
        }

        return new Modulo();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
