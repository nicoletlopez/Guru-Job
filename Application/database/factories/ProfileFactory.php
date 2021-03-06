<?php

use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        'picture' => $faker->imageUrl($width = 640, $height = 480), // 'http://lorempixel.com/640/480/'
        'description' => $faker->realText(200),
        'dob' => $faker->date($format = 'Y-m-d', $max = '2000-01-01'),
        'city' => $faker->city,
        'street_address' => $faker->streetAddress,
    ];
});
