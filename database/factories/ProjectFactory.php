<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Project::class, function (Faker $faker) {
    $title = $faker->sentence(5);
    return [
        'description'=> $faker->text(50),
        'title'=> $title,
        'status'=> $faker->randomElement(['Terminado','Cancelado','Procesando'])
    ];
});
