<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert(
        ['nome' => 'Camiseta Polo', 'preco' => 100,
        'estoque' => 4, 'categoria_id' => 1 ]);

        DB::table('produtos')->insert(
        ['nome' => 'Calça Jeans', 'preco' => 120,
        'estoque' => 1, 'categoria_id' => 1 ]);

        DB::table('produtos')->insert(
        ['nome' => 'Camiseta Manga Longa', 'preco' => 35,
        'estoque' => 2, 'categoria_id' => 1 ]);

        DB::table('produtos')->insert(
        ['nome' => 'PC Games', 'preco' => 75,
        'estoque' => 4, 'categoria_id' => 2 ]);

        DB::table('produtos')->insert(
        ['nome' => 'Impressora', 'preco' => 25,
        'estoque' => 5, 'categoria_id' => 6 ]);

        DB::table('produtos')->insert(
        ['nome' => 'Mouse', 'preco' => 95,
        'estoque' => 6, 'categoria_id' => 6 ]);

        DB::table('produtos')->insert(
        ['nome' => 'Perfume', 'preco' => 100,
        'estoque' => 7, 'categoria_id' => 3 ]);

        DB::table('produtos')->insert(
        ['nome' => 'Cama de Casal', 'preco' => 100,
        'estoque' => 8, 'categoria_id' => 4 ]);

        DB::table('produtos')->insert(
            ['nome' => 'Guarda Roupa', 'preco' => 150,
            'estoque' => 8, 'categoria_id' => 4 ]);
    }
}
