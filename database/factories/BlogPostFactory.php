<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\BlogPost;
use Faker\Generator as Faker;

$factory->define(BlogPost::class, function (Faker $faker) {
    static $count = 1;
    return [
        'title' => 'Blog post ' . $count,
        'body' => $faker->paragraph,
        'image' => $faker->imageUrl(),
        'blog_category_id' => $faker->numberBetween(1, 10),
    ];
});
