<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Recipe;
use Faker\Generator as Faker;

$factory->define(
    Recipe::class,
    function (Faker $faker) {
        return [
            'name'         => $faker->name,
            'description'  => $faker->realText(200),
            'instructions' => $faker->realText(200),
            'minutes'      => $faker->numberBetween(5, 99),
            'difficulty'   => $faker->numberBetween(1, 5),
            'shared'       => $faker->boolean,
        ];
    }
);
