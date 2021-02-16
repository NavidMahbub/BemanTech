<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\ProjectPost;
use Faker\Generator as Faker;

$factory->define(ProjectPost::class, function (Faker $faker) {
    static $count = 1;
    $data = [
        [
            'key' => 'Key ' . $count,
            'value' => $faker->paragraph
        ],
        [
            'key' => 'Key ' . $count,
            'value' => $faker->paragraph
        ]
    ];
    return [
        'title' => 'Project post ' . $count++,
        'body' => json_encode($data),
        'image1' => '',
        'image2' => '',
        'image3' => '',
        'image4' => '',
        'image5' => '',
        'project_category_id' => $faker->numberBetween(1, 3),
    ];
});
