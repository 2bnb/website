<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Resource;
use Faker\Generator as Faker;

$factory->define(Resource::class, function (Faker $Faker) {
    $filetype = $faker->random_Element([
        '.html',
        '.png',
        '.jpg',
        '.pdf',
        '.mp4'
    ]);
    if ($fileType != '.html' and $filetype != '.pdf') {
        $fileDescription = $faker->random_element([
            'Sunday operation picture',
            'User avatar',
            'Image from operation',
            'Homepage Banner',
            'User signature'
        ]);
        $fileDimensions = $faker->random_Element([
            '32x32',
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
        ]);
        $fileDimensionsSplit = explode('x', $fileDimensions);
        $fileHeight = $fileDimensionsSplit[0];
        $fileWidth = $fileDimensionsSplit[1];
        $filDirectory = 'public/' . $faker->numerify('######') . $fileDimensions; 
    } elseif ($fileType == '.html') {
        $fileDescription = $faker->randomElement([
            'Base mod preset',
            'Optionals mod preset'
        ]);
        $fileDimensions = 'N/A';
        $fileHeight = 'N/A';
        $fileWidth = 'N/A';
        $fileDirectory = 'public/' . $faker->numerify('######') . $fileDescription; 
    } elseif ($fileType == '.pdf') {
        $fileDescription = $faker->randomElement([
            'AT Training Doc',
            'Mission briefing',
            'Land nav training doc'
        ]);
        $fileDimensions = 'N/A';
        $fileHeight = 'N/A';
        $fileWidth = 'N/A';
        $fileDirectory = 'public/' . $faker->numerify('######') . $fileDescription;
    }
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
        'media' => json_encode($fileType, $fileDimensions, $fileHeight, $fileWidth, $fileDirectory),
        'uploader_uuid' => $faker->uuid
    ];
});