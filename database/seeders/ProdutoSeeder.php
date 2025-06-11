<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    public function run(): void
    {
        $produtos = [
            [
                'nome' => 'Mouse Gamer RGB',
                'descricao' => 'Mouse gamer com iluminação RGB e alta precisão.',
                'preco' => 149.90,
                'estoque' => 30,
                'imagem' => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&w=400&q=80',
                'categoria_id' => 1,
            ],
            [
                'nome' => 'Teclado Mecânico',
                'descricao' => 'Teclado mecânico com switches azuis e iluminação LED.',
                'preco' => 299.90,
                'estoque' => 20,
                'imagem' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=400&q=80',
                'categoria_id' => 1,
            ],
            [
                'nome' => 'Monitor 24" Full HD',
                'descricao' => 'Monitor de 24 polegadas com resolução Full HD.',
                'preco' => 899.00,
                'estoque' => 15,
                'imagem' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=400&q=80',
                'categoria_id' => 2,
            ],
            [
                'nome' => 'Headset Bluetooth',
                'descricao' => 'Headset sem fio com microfone e cancelamento de ruído.',
                'preco' => 199.90,
                'estoque' => 25,
                'imagem' => 'https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=400&q=80',
                'categoria_id' => 3,
            ],
            [
                'nome' => 'Webcam HD',
                'descricao' => 'Webcam com resolução HD para videoconferências.',
                'preco' => 129.90,
                'estoque' => 40,
                'imagem' => 'https://images.unsplash.com/photo-1526178613658-3f1622045557?auto=format&fit=crop&w=400&q=80',
                'categoria_id' => 4,
            ],
        ];

        foreach ($produtos as $produto) {
            Produto::create($produto);
        }
    }
}