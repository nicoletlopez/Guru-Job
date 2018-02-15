<?php

use Faker\Generator as Faker;

$factory->define(App\Subject::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'desc' => $faker->paragraphs(2,true),
        'start_time' => $faker->time($format = 'H:i:s', $max = '12:00:00'), // '20:49:42'
        'end_time' => $faker->time($format = 'H:i:s', $max = '19:30:00'), // '20:49:42'
        'days' => rand(0,127),
    ];
});
