<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peca extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_peca',
        'preco',
    ];

    protected $table = 'pecas';

    protected $primaryKey = 'idpeca';
}
