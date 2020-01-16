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
		'discord_id' => $faker->randomElement(['Arend#', 'Ford#', 'Farcry#', 'Human#']) . $faker->numerify('####'),
		'date_of_birth' => $faker->date()
	];
});

$factory->state(User::class, 'full', function (Faker $faker) {
	return [
		'uuid' => $faker->uuid,
		'name' => $faker->name,
		'join_date' => $faker->date(),
		'discord_id' => $faker->randomElement(['Arend#', 'Ford#', 'Farcry#', ]) . $faker->numerify('####'),
		'discord_access_token' => Str::random(10),
		'avatar_resource_id' => $faker->unique()->randomNumber,
		'date_of_birth' => $faker->date(),
		'country' => $faker->numerify('###'),
		'timezone' => $faker->numerify('UTC+##:##'),
		'data' => json_encode($faker->randomElements([
			null,
			'',
			'Previous Arma 3 Experience' => $faker->randomElement([
				'Has plenty of experience!',
				'Was in an American unit for a while',
				'3rd Shock master race, but 2BNB best beast',
				'None whatsoever',
				'Does gmod count?'
			]),
			'Admin Comments' => $faker->randomElements([
				'Good kid, though a bit young',
				'intelligent guy, willing to learn a lot',
				'Maximus 2.0',
				'You could hit this guy with a sledghammer and he\'d smile back'
			]),
			'steam_id' => $faker->randomNumber(),
			'language' => $faker->languageCode,
			'theme' => $faker->randomElement(['light','dark']),
			'is_hidden_donator' => $faker->boolean()
		], rand(2,8))),
		'rank_id' => $faker->unique()->randomNumber
	];
});
