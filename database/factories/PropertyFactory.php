<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Property;
use Faker\Generator as Faker;

$factory->define(Property::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'price' => $faker->numberBetween($min = 100000, $max = 100000000),
        'floor_area' => $faker->numberBetween($min = 50, $max = 500),
        'bedrom' => $faker->numberBetween($min = 1, $max = 7),
        'bathroom' => $faker->numberBetween($min = 1, $max = 7),
        'city' => $faker->city,
        'address' => $faker->address,
        'description' => $faker->text,
        'near_by_places' => $faker->streetName,
    ];
});
