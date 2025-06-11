<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * Relacionamento muitos-para-muitos entre Pedido e Produto.
     * Usa a tabela pivô 'pedido_produto' para armazenar os produtos de cada pedido,
     * incluindo informações extras como quantidade e preço unitário.
     * O método withPivot permite acessar esses campos adicionais ao recuperar os produtos do pedido.
     */
    public function produtos()
    {
        return $this->belongsToMany(\App\Models\Produto::class, 'pedido_produto')
            ->withPivot('quantidade', 'preco_unitario')
            ->withTimestamps();
    }
}