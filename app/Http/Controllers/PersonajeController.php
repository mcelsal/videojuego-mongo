<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personaje;

class PersonajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // recogemos el filtro por nivel (campo "nivel" del formulario)
        $nivel = $request->input('nivel');

        $query = Personaje::query();

        // si se ha indicado un nivel, filtramos
        if ($nivel !== null && $nivel !== '') {
            $query->where('level', intval($nivel));
        }

        $todosPersonajes = $query->get();

        return view('personajes.index', [
            'personajes' => $todosPersonajes,
            'nivel'      => $nivel,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function updateCoins(Request $request, string $id)
    {
        // cambio puede ser +10 o -10
        $change = intval($request->input('change', 0));

        // Buscar personaje por su _id (Mongo)
        $personaje = Personaje::find($id);

        if (!$personaje) {
            return redirect()->back()->with('error', 'Personaje no encontrado');
        }

        $coinsActuales = intval($personaje->coins ?? 0);
        $nuevasCoins   = $coinsActuales + $change;

        if ($nuevasCoins < 0) {
            $nuevasCoins = 0; // evitamos negativos
        }

        $personaje->coins = $nuevasCoins;
        $personaje->save();

        return redirect()->back()->with('success', 'Monedas actualizadas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
