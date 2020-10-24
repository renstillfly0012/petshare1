<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pet;
use Faker\Generator as Faker;

$factory->define(Pet::class, function (Faker $faker) {
    return [
        'name' => bcrypt(now()),
        // 'image' => $faker->imageUrl(400,420),
        'image' => 'https://picsum.photos/400/400',
        'age' => $faker->randomDigitNot(0),
        'breed' => $faker->word,
        'status' => 'Available',
        'description' => $faker->sentences(rand(2,10), true),
    ];
});
