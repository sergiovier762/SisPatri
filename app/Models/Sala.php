<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $table = 'salas';

    protected $fillable = [
        'nome',
        'bloco',
        'unidade',
    ];
}
