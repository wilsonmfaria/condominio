<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class Condominio extends Model
{
    protected $fillable = [
        'mesAno',
        'apId',
        'totalContas',
        'caixa',
        'totalFinal',
        'valorPagar',
        'status'
    ];
}
