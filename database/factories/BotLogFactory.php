<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BotLog;
use Faker\Generator as Faker;

$factory->define(BotLog::class, function (Faker $faker) {
    return [
        'data' => '{"message": "'.$faker->sentence().'"}'
    ];
});
