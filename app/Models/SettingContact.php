<?php

namespace App\Models;

use App\BaseModel;

class SettingContact extends BaseModel
{
    protected $fillable = [
        'primary_email',
        'secondary_email',
        'primary_phone',
        'secondary_phone',
        'primary_tel',
        'secondary_tel',
        'primary_fax',
        'secondary_fax',
        'po',
        'address',
        'map_url',
        'working_hours',
        'working_days',
        'facebook',
        'twitter',
        'google_plus',
        'linkedin',
        'skype',
        'youtube'
    ];

    protected $hidden = [

    ];

    public static $rules = [
        'primary_email' => 'required',
        'primary_phone' => 'required',
        'primary_tel' => 'required',
        'primary_fax' => 'required',
        'address' => 'required',
        'working_hours' => 'required',
        'working_days' => 'required',
        'facebook' => 'required',
        'skype' => 'required',
    ];
}
