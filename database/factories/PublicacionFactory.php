<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Publicacion;
use Faker\Generator as Faker;

$factory->define(Publicacion::class, function (Faker $faker) {
    return [
        'titulo' => $faker->sentence,
        'categoria_id' => $faker->numberBetween(1,8),
        'articulo' => $faker->paragraph(50),
        'activo' => $faker->numberBetween(0,1),
    ];
});
