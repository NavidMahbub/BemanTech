<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Job;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {
    static $count = 1;
    return [
        'title' => 'Job ' . $count++,
        'description' => $faker->paragraph,
        'vacancy' => $count++,
        'salary' => $faker->numberBetween(200, 300),
        'company_name' => $faker->company,
        'country' => $faker->country,
        'person_name' => $faker->name,
        'email' => $faker->safeEmail,
        'designation' => $faker->word,
        'attachment' => '',
        'expiry_date' => $faker->date('d/m/Y', 'now')
    ];
});
