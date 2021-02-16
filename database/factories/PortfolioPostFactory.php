<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\PortfolioPost;
use Faker\Generator as Faker;

$factory->define(PortfolioPost::class, function (Faker $faker) {
    static $count = 1;
    return [
        'title' => 'Portfolio post ' . $count++,
        'body' => $faker->paragraph,
        'image' => '',
        'portfolio_category_id' => $faker->numberBetween(1, 10),
    ];
});
