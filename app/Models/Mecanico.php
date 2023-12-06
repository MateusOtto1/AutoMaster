<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mecanico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'especialidade',
        'email',
    ];

    protected $table = 'mecanicos';

    protected $primaryKey = 'idmecanico';

    public function equipe()
    {
        return $this->belongsToMany('App\Models\Equipe');
    }
}
