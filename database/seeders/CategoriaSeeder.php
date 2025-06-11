<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            ['nome' => 'Periféricos'],
            ['nome' => 'Monitores'],
            ['nome' => 'Áudio'],
            ['nome' => 'Webcams'],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}