<?php

use Illuminate\Database\Seeder;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Categoria::create([
            'categoria' => 'criminal',
        ]);

        \App\Categoria::create([
            'categoria' => 'científico',
        ]);

        \App\Categoria::create([
            'categoria' => 'desportivo',
        ]);

        \App\Categoria::create([
            'categoria' => 'artístico',
        ]);
    }
}
