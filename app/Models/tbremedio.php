<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbremedio extends Model
{
    protected $fillable =[
        'nome',
        'indicacao',
        'contraindicacao',
        'codigoDeBarras',
        'peso',
        'NecessarioReceita?'
    ];
}
