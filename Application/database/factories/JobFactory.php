<?php

use Faker\Generator as Faker;

$factory->define(App\Job::class, function (Faker $faker) {
    return [
        'title' => 'Hiring '.$faker->sentence(3),
        'desc' => $faker->paragraphs(3,true),
        'salary' => $faker->randomFloat($nbMaxDecimals = 2, $min = 10000, $max = 50000) // 48.8932
    ];
});
