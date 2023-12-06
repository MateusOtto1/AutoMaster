<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
    ];

    protected $table = 'equipes';

    protected $primaryKey = 'idequipe';

    public function mecanicos()
    {
    return $this->belongsToMany('App\Models\Mecanico');
    }
}
