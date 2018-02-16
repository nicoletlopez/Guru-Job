<?php

use Faker\Generator as Faker;

$factory->define(App\Schedule::class, function (Faker $faker) {
    return [
        'start' => $faker->time($format = 'H:i:s', $max = '12:00:00'), // '20:49:42'
        'end' => $faker->time($format = 'H:i:s', $max = '19:30:00'), // '20:49:42'
    ];
});
