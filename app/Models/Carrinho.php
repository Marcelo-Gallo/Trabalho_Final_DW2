<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    protected $fillable = ['user_id'];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'carrinho_produto')
            ->withPivot('quantidade')
            ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}