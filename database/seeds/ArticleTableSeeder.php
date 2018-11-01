<?php

use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Article::create([
            'titulo'=>'Batatas gigantes encontradas no mato',
            'data'=>'2018-10-24',
            'descricao'=>'batatas não são para brincadeiras',
            'user_id' => 1,
            'categoria_id' => 1
        ]);

        \App\Article::create([
            'titulo'=>'Azeitonas gigantes encontradas no mato',
            'data'=>'2018-10-24',
            'descricao'=>'azeitonas não são para brincadeiras',
            'user_id' => 1,
            'categoria_id' => 2

        ]);

        \App\Article::create([
            'titulo'=>'Tremoços gigantes encontradas no mato',
            'data'=>'2018-10-24',
            'descricao'=>'tremoços não são para brincadeiras',
            'user_id' => 1,
            'categoria_id' => 3

        ]);

        \App\Article::create([
            'titulo'=>'Nabos gigantes encontradas no mato',
            'data'=>'2018-10-24',
            'descricao'=>'nabos não são para brincadeiras',
            'user_id' => 1,
            'categoria_id' => 4

        ]);

    }
}
