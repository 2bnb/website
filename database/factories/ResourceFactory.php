<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Resource;
use Faker\Generator as Faker;

$factory->define(Resource::class, function (Faker $Faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->random_Element([
            '',
            'Sunday operation',
            'Image from operation',
            'Mod preset',
            'User Avatar'
        ]),
        'type' => $faker->random_Element([
            '.html',
            '.png',
            '.jpg',
            '.pdf',
            '.mp4',
            '.gif'
        ]),
        'media' => json_encode($faker->random_Elements([
            null,
            '',
            'Files' => ($faker->random_Elements([
                '32x32,file' . $faker->numerify('######') . '32, 32,',
                '1080x1920',
                '320x320',
                '90x90',
                '120x120',
                '500x500',
                '320x50',
                '300x100',
                '125x125',
                '320x480',
                '960x640'
            ]))
        ]))
    ];
});