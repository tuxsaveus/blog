<?php

use App\Publicacion;
use Illuminate\Database\Seeder;

class PublicacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Publicacion::class, 10)->create();
    }
}
