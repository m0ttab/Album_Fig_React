<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Figurinha extends Model
{
    protected $fillable = [
        'id',
        'nome',
        'dt_nascimento',
        'naturalidade',
        'foto',
        'numero'
    ];
}
