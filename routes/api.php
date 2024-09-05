<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CursoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/usuarios', [AuthController::class, 'store']);

Route::post('/logear', [AuthController::class, 'index']);

Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::get('/rutas', [CursoController::class, 'index']);

Route::get('/cursos/{id}', [CursoController::class, 'show']);

