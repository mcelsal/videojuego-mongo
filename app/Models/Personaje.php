<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\DocumentModel;
use Illuminate\Database\Eloquent\Model;

class Personaje extends Model
{
    use DocumentModel;

    protected $table = 'personajes';

    protected $fillable = [
        'name',
        'level',
        'coins',
        'created_at',
        'stats'
    ];
    
    protected $keyType = 'string';

}
