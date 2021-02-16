<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\SettingSite;
use Faker\Generator as Faker;

$factory->define(SettingSite::class, function (Faker $faker) {
    return [
        'logo' => '',
        'license_no' => $faker->numberBetween(10000, 999999),
        'registration_no' => $faker->numberBetween(10000, 999999),
        'copyright_text' => 'Copyright © example.com. All rights reserved.',
        'brochure' => $faker->imageUrl(),
        'twitter_feed' => '',
        'facebook_likebox' => ''
    ];
});
