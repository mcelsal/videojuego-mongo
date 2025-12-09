<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PersonajeController;

Route::resource('personajes', PersonajeController::class);

Route::post('personajes/{id}/coins', [PersonajeController::class, 'updateCoins'])
    ->name('personajes.updateCoins');

Route::get('/', function () {
    return view('welcome');
});
