<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiPersonajeController;

Route::get('/personajes', [ApiPersonajeController::class, 'index']);
Route::get('/personajes/nivel/{nivel}', [ApiPersonajeController::class, 'filtrarPorNivel']);
