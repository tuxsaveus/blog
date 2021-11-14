<?php

use App\Categoria;
use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = ['Humor','Educacion','Deportes','Accion','Noticias','Drama','Suspenso', 'Romance'];

        foreach ($categorias as $categoria) {
            Categoria::create([
                'nombre' => $categoria
            ]);
        }
    }
}
