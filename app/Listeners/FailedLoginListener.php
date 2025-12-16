<?php

namespace App\Listeners;

use App\Events\FailedLoginEvent;
use Illuminate\Support\Facades\Log;

class FailedLoginListener
{
    public function handle(FailedLoginEvent $event): void
    {
        Log::warning('Login fallido', [
            'usuario' => $event->usuario->usuario,
            'fecha'   => now()->toDateTimeString()
        ]);
    }
}

