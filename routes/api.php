<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/usuarios', [UserController::class, 'index']);

Route::post('/usuarios', [UserController::class, 'store']);

