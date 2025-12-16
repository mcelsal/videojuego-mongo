<?php

namespace App\Listeners;

use App\Events\FailedLoginEvent;

class BlockUserListener
{
    public function handle(FailedLoginEvent $event): void
    {
        $usuario = $event->usuario;

        $usuario->intentos_fallidos++;

        if ($usuario->intentos_fallidos >= 3) {
            $usuario->bloqueado = true;
        }

        $usuario->save();
    }
}

