<?php

use App\Http\Controllers\Api\CursoController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/logear', [UserController::class, 'index']);

Route::post('/usuarios', [UserController::class, 'store']);

Route::get('/rutas', [CursoController::class, 'index']);

Route::get('/cursos/{id}', [CursoController::class, 'show']);

