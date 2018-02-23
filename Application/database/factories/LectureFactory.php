<?php

use Faker\Generator as Faker;

$factory->define(App\Lecture::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'overview' => $faker->paragraphs($nb = rand(1,2), $asText = true),
        'objectives' => $faker->paragraphs($nb = 1, $asText = true),
    ];
});
