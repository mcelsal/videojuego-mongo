<?php

namespace App\Http\Controllers;

use App\Models\Personaje;
use Illuminate\Http\Request;

class ApiPersonajeController extends Controller
{
    // 1) Devolver todos los datos
    public function index()
    {
        $personajes = Personaje::all();

        return response()->json([
            'status' => 'success',
            'count'  => $personajes->count(),
            'data'   => $personajes,
        ], 200);
    }

    // 2) Filtrar datos por un campo (nivel)
    public function filtrarPorNivel(int $nivel)
    {
        $personajes = Personaje::where('level', $nivel)->get();

        if ($personajes->isEmpty()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'No se han encontrado personajes con ese nivel',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'count'  => $personajes->count(),
            'data'   => $personajes,
        ], 200);
    }
}
