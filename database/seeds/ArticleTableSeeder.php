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
            'titulo'=>'UA vence competição da NATO para combater extremistas na Internet',
            'data'=>'2018-12-10',
            'descricao'=>'A solução da Universidade de Aveiro (UA) é a grande vencedora da competição lançada pela NATO Strategic Communications Centre of Excellence (NATO StratCom)',
            'user_id' => 1,
            'categoria_id' => 1,
            'artigo_imagem' => 'articleImages/UA_01.jpeg'
        ]);

        \App\Article::create([
            'titulo'=>'Notícia exemplo 1',
            'data'=>'2018-10-24',
            'descricao'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis',
            'user_id' => 1,
            'categoria_id' => 2,
            'artigo_imagem' => 'articleImages/default.jpg'

        ]);

        \App\Article::create([
            'titulo'=>'Notícia exemplo 2',
            'data'=>'2018-10-24',
            'descricao'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quiss',
            'user_id' => 1,
            'categoria_id' => 3,
            'artigo_imagem' => 'articleImages/default.jpg'


        ]);

        \App\Article::create([
            'titulo'=>'Notícia exemplo 3',
            'data'=>'2018-10-24',
            'descricao'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis',
            'user_id' => 1,
            'categoria_id' => 4,
            'artigo_imagem' => 'articleImages/default.jpg'


        ]);

    }
}
