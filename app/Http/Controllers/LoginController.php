<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $usuarioInput  = $request->input('usuario');
        $passwordInput = $request->input('password');

        // Buscar usuario en MongoDB por nombre de usuario
        $usuario = Usuario::where('usuario', $usuarioInput)->first();

        // Si no existe el usuario
        if (!$usuario) {
            return back()->with('error', 'Usuario no encontrado');
        }

        // Si el usuario está bloqueado
        if ($usuario->bloqueado) {
            return back()->with('error', 'Usuario bloqueado por demasiados intentos');
        }

        // Comprobar password 
        if ($usuario->password !== $passwordInput) {
            return back()->with('error', 'Contraseña incorrecta');
        }

        // Si todo es correcto → lo mandamos a personajes
        return redirect()->route('personajes.index')->with(
            'success',
            'Login correcto. Bienvenido ' . $usuario->usuario
        );
    }
}

