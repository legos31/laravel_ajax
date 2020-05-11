<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Town;
use Faker\Generator as Faker;

$factory->define(Town::class, function (Faker $faker) {
    $city = $faker->city;
    $latitude = $faker->latitude($min = -90, $max = 90);
    $longitude = $faker->longitude($min = -180, $max = 180);
    $people = rand(100000,5000000);
    return [
        'city' => $city,
        'latitude' => $latitude,
        'longitude' => $longitude,
        'people' => $people,
    ];
});
