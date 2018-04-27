<?php

use Faker\Generator as Faker;

$factory->define(App\Resume::class, function (Faker $faker) {
    return [
        'template' => rand(1,2),
        'is_main' => 1,
    ];
});
