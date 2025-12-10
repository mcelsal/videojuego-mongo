<?php 

namespace App\Models;

use MongoDB\Laravel\Eloquent\DocumentModel;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use DocumentModel;

    protected $table = 'usuarios';

    protected $fillable = [
        'usuario',
        'password',
        'intentos_fallidos',
        'bloqueado',
    ];

    protected $casts = [
        'bloqueado' => 'boolean',
        'intentos_fallidos' => 'integer',
    ];
}
