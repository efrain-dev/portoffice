<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Product::class, function (Faker $faker) {
    $title = $faker->sentence(1);
    $img = '/imagenes/unnamed.jpg';

    return [
        'id_brand'=> rand(1,10),
        'name'=> $title,
        'quantity'=> rand(1,30),
        'price'=> rand(1,30),
        'file'=>  $img
    ];
});
