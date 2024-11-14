<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'sala_id',
        'fornecedor_id',
        'numero_fatura',
        'numero_patrimonio',
        'data_aquisicao'
    ];

    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }
}
