<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Brand::class, function (Faker $faker) {
    $title = $faker->sentence(1);
    $img = '/imagenes/unnamed.jpg';
    return [
        'name'=> $title,
        'description'=> $faker->text(750),
        'file'=> $img
    ];
});
