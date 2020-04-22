<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Permission;
use Faker\Generator as Faker;

$factory->define(Permission::class, function (Faker $faker) {
    return [
		'model' => $faker->randomElement(['App/Test', 'App/FakeModel', 'App/TestModel']),
		'type' => $faker->randomElement(['edit', 'create', 'delete', 'view'])
    ];
});
