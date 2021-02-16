<?php

namespace App\Models;

use App\BaseModel;

class Gallery extends BaseModel
{
    protected $fillable = [
        'title',
        'image',
        'status'
    ];

    protected $hidden = [

    ];

    public static $rules = [
        'title' => 'required',
        'image' => 'required'
    ];
}
