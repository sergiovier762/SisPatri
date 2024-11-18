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
        'marca',
        'preco',
        'sala_id',
        'fornecedor_id',
        'user_id',
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

    public function user()
   {
        return $this->belongsTo(User::class);
    }
}
