<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdemServico extends Model
{
    use HasFactory;

    protected $fillable = [
        'valor',
        'descricao',
        'data_emissao',
        'data_conclusao',
        'status',
    ];

    protected $table = 'ordem_servicos';

    protected $primaryKey = 'idordem_servico';

    public function pecas()
    {
        return $this->belongsToMany('App\Models\Peca');
    }
}
