<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $usuario  = $request->input('usuario');
        $password = $request->input('password');

        return "Usuario: $usuario | Password: $password";
    }
}
