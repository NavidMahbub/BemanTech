<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Team;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    static $count = 1;
    return [
        'name' => $faker->name,
        'designation' => $faker->word,
        'image' => '',
        'about' => $faker->paragraph,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'facebook' => $faker->url,
        'twitter' => $faker->url,
        'linkedin' => $faker->url,
        'order' => $count++
    ];
});
