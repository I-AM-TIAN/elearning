<?php

namespace App\Filament\Resources\CursoResource\Pages;

use App\Filament\Resources\CursoResource;
use App\Models\Curso;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Request;

class CreateCurso extends CreateRecord
{
    protected static string $resource = CursoResource::class;
}
