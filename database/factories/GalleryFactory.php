<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Gallery;
use Faker\Generator as Faker;

$factory->define(Gallery::class, function (Faker $faker) {
    static $count = 1;
    return [
        'title' => 'Photo ' . $count++,
        'image' => ''
    ];
});
