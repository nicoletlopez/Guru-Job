<?php

use Faker\Generator as Faker;

$factory->define(App\Job::class, function (Faker $faker) {
    return [
        'title' => 'Hiring '.$faker->sentence(3),
        'desc' => $faker->paragraphs(3,true),
        'start_time' => $faker->time($format = 'H:i:s', $max = '12:00:00'), // '20:49:42'
        'end_time' => $faker->time($format = 'H:i:s', $max = '19:30:00'), // '20:49:42'
        'salary' => $faker->randomFloat($nbMaxDecimals = 2, $min = 10000, $max = 50000) // 48.8932
    ];
});
