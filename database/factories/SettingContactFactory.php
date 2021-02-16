<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\SettingContact;
use Faker\Generator as Faker;

$factory->define(SettingContact::class, function (Faker $faker) {
    return [
        'primary_email' => 'primary@example.com',
        'secondary_email' => 'secondary@example.com',
        'primary_phone' => '+880120000000',
        'secondary_phone' => '+880120000001',
        'primary_tel' => '+880120000002',
        'secondary_tel' => '+880120000003',
        'primary_fax' => '+880120000004',
        'secondary_fax' => '+880120000005',
        'po' => '1212',
        'address' => 'Dhaka, Bangladesh',
        'map_url' => 'https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d14598.869775264291!2d90.42532335!3d23.82864465!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1559083495945!5m2!1sen!2sbd',
        'working_hours' => '9am to 5pm',
        'working_days' => 'Sunday To Thursday - 5 Days',
        'facebook' => 'facebook.com/compnay',
        'twitter' => 'twitter.com/compnay',
        'google_plus' => 'plus.google.com/compnay',
        'linkedin' => 'linkedin.com/compnay',
        'skype' => 'compnay',
        'youtube' => 'youtube.com/compnay',
    ];
});
