<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\SettingSeo;
use Faker\Generator as Faker;

$factory->define(SettingSeo::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'image' => $faker->imageUrl(),
        'author' => $faker->company,
        'description' => $faker->paragraph
    ];
});
