<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PersonajeController;

Route::resource('personajes', PersonajeController::class);

Route::get('/', function () {
    return view('welcome');
});
