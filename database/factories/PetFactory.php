<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'image' => 'pspcalogo.png',
        'name' => $faker->name,
        'age' => Int::random(3),
        'breed' => $faker->breed,
        'description' => $faker->description,

    ];
});
