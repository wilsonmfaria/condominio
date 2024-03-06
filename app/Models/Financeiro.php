<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class Financeiro extends Model
{
    protected $fillable = [
        'mesAno',
        'debito',
        'credito',
        'saldo',
    ];
}
