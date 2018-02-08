<?php

use Faker\Generator as Faker;

$factory->define(App\Subject::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'desc' => $faker->paragraphs(2,true),
    ];
});
