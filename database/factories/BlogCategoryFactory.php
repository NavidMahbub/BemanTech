<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\BlogCategory;
use Faker\Generator as Faker;

$factory->define(BlogCategory::class, function (Faker $faker) {
    static $count = 1;
    return [
        'title' => 'Blog category ' . $count++
    ];
});
