<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\PortfolioCategory;
use Faker\Generator as Faker;

$factory->define(PortfolioCategory::class, function (Faker $faker) {
    static $count = 1;
    return [
        'title' => 'Portfolio category ' . $count++
    ];
});
