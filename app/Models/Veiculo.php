<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;
    protected $fillable = [
        'modelo',
        'cor',
        'ano',
        'placa',
        'cliente_dono',
    ];

    protected $table = 'veiculos';

    protected $primaryKey = 'idveiculo';
}
