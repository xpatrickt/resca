<?php

use Faker\Generator as Faker;

$factory->define(resca\Actividad::class, function (Faker $faker) {
    return [
        'nombreactividad' => $faker->sentence,
        'descripcionactividad' => $faker->sentence,
    ];
});
