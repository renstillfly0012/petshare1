<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pet;
use Faker\Generator as Faker;

$factory->define(Pet::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'image' => $faker->imageUrl,
        'age' => $faker->randomDigitNot(0),
        'breed' => $faker->word,
        'status' => 'Available',
        'description' => $faker->sentences(rand(2,10), true),
    ];
});
