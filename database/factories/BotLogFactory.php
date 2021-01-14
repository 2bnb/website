<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BotLog;
use Faker\Generator as Faker;

$factory->define(BotLog::class, function (Faker $faker) {
    return [
		'bot_uuid' => factory(App\Bot::class),
        'data' => '{"message": "'.$faker->sentence.'"}'
    ];
});
