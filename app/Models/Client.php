<?php

namespace App\Models;

use App\BaseModel;

class Client extends BaseModel
{
    protected $fillable = [
        'name',
        'logo',
        'about',
        'website',
        'order',
        'status'
    ];

    protected $hidden = [

    ];

    public static $rules = [
        'name' => 'required',
        'logo' => 'required',
        'order' => 'required'
    ];
}
