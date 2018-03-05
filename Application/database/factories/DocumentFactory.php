<?php

use Faker\Generator as Faker;

$factory->define(App\Document::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nb = rand(1,3), $asText = true),
        'desc' => $faker->paragraphs($nb = rand(1,2), $asText = true),
    ];
});
