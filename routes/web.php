<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PersonajeController;

use App\Http\Controllers\LoginController;


Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::resource('personajes', PersonajeController::class);

Route::post('personajes/{id}/coins', [PersonajeController::class, 'updateCoins'])
    ->name('personajes.updateCoins');

Route::get('/', function () {
    return view('welcome');
});
