<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
	return [
		'uuid' => $faker->uuid,
		'name' => $faker->name,
		'join_date' => $faker->date(),
		'discord_id' => $faker->randomElement(['Arend#', 'Ford#', 'Farcry#', ]) . $faker->numerify('####'),
		'discord_access_token' => Str::random(10),
		'avatar_resource_id' => $faker->unique()->randomDigit,
		'date_of_birth' => $faker->date(),
		'country' => $faker->numerify('###'),
		'timezone' => $faker->numerify('UTC+##:##'),
		'data' => $faker->json(),
		'status_id' => $faker->unique()->randomDigit,
		'rank_id' => $faker->unique()->randomDigit,
		'user_qualification_id' => $faker->unique()->randomDigit,
	];
});
