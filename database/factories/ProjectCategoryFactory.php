<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\ProjectCategory;
use Faker\Generator as Faker;

$factory->define(ProjectCategory::class, function (Faker $faker) {
    static $count = 0;
    $category = ['Category 1', 'Category 2', 'Category 3', 'Category 4'];
    return [
        'title' => $category[$count++]
    ];
});
