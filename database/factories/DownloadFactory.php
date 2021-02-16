<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Download;
use Faker\Generator as Faker;

$factory->define(Download::class, function (Faker $faker) {
    static $count = 1;
    return [
        'title' => 'Download ' . $count++,
        'file' => $faker->imageUrl()
    ];
});
