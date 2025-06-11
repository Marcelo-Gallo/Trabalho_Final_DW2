<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'estoque',
        'imagem',
        'categoria_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(\App\Models\Categoria::class);
    }

    public function pedidos()
    {
        return $this->belongsToMany(\App\Models\Pedido::class, 'pedido_produto')
            ->withPivot('quantidade', 'preco_unitario');
    }
}