<?php

namespace App\Models;

use App\BaseModel;

class Team extends BaseModel
{
    protected $fillable = [
        'name',
        'designation',
        'about',
        'image',
        'email',
        'phone',
        'facebook',
        'twitter',
        'linkedin',
        'order',
        'status'
    ];

    protected $hidden = [

    ];

    public static $rules = [
        'name' => 'required',
        'designation' => 'required',
        'order' => 'required'
    ];
}
