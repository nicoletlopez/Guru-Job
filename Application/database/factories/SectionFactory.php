<?php

use Faker\Generator as Faker;

$factory->define(App\Section::class, function (Faker $faker) {
    return [
        'content' => 'Worked as '.$faker->jobTitle.' at '.$faker->company,
    ];
});
