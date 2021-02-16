<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Slider;
use Faker\Generator as Faker;

$factory->define(Slider::class, function (Faker $faker) {
    static $count = 1;
    return [
        'title' => 'Slider ' . $count,
        'body' => $faker->paragraph,
        'image' => '/image/slider/' . $count . '.jpg',
        'order' => $count++
    ];
});
