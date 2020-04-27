<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bot;
use Faker\Generator as Faker;

$factory->define(Bot::class, function (Faker $faker) {
    return [
		'name' => $faker->word,
		'description' => $faker->sentence
    ];
});
