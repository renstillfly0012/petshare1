<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pet;
use Faker\Generator as Faker;

$factory->define(Pet::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'image' => 'pspcalogo.png',
        'age' => 1,
        'breed' => $faker->breed,
        'status' => 'Available',
        'description' => $faker->description,
    ];
});
