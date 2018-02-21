<?php

use Faker\Generator as Faker;

$factory->define(App\File::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(5),
        'desc' => $faker->realText($maxNbChars = 200, $indexSize = 2),
    ];
});
