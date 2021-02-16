<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    static $count = 1;
    return [
        'name' => 'Client ' . $count,
        'logo' => '/image/client/' . $count . '.jpg',
        'about' => $faker->paragraph,
        'website' => $faker->url,
        'order' => $count++
    ];
});
