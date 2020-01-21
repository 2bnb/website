<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Config;
use Faker\Generator as Faker;

$factory->define(Config::class, function (Faker $faker) {
    return [
    	'name' => $faker->randomElement([
    		'social_media_links',
    		'website_name',
    		'website_title',
    		'email_links',
    		'unit_tag',
    		'global_currency',
    		'award_types',
    		'resource_types',
    		'event_types',
    		'post_types'
    	])
    ];
});

$factory->state(Config::class, 'values', function (Faker $faker) {
    return [
    	'value' => $faker->randomElement([
    		'https://www.youtube.com/watch?v=eaW76aDKObk&list=PLA_zjX3swAf5tsw9KdHOGodzcJ_PptL9a',
    		'2nd Battalion, Nord Brigade',
    		'{"Qualification","Award"}',
    		'EUR',
    		'{"Operation","Training","Mini-op"}',
    		'{"Blog","Annoucement"}'
    	])
    ];
});
