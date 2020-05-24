<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ingredient;
use Faker\Generator as Faker;

$factory->define(
    Ingredient::class,
    function (Faker $faker) {
        return [
            'name'  => $faker->name,
            'price' => $faker->randomFloat(2, 0, 15),
        ];
    }
);
