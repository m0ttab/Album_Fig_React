<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = [
        'id',
        'data_hora',
        'pacote_id'
    ];
}

?>
