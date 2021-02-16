<?php

namespace App\Models;

use App\BaseModel;

class SettingSite extends BaseModel
{
    protected $fillable = [
        'logo',
        'license_no',
        'registration_no',
        'copyright_text',
        'brochure',
        'twitter_feed',
        'facebook_likebox'
    ];

    protected $hidden = [

    ];

    public static $rules = [
        'logo' => 'required',
        'license_no' => 'required',
        'brochure' => 'required',
    ];
}
