<?php

namespace App\Models;

use App\BaseModel;

class Slider extends BaseModel
{
    protected $fillable = [
        'title',
        'body',
        'image',
        'order',
        'status'
    ];

    protected $hidden = [

    ];

    public static $rules = [
        'title' => 'required',
        'image' => 'required',
        'order' => 'required'
    ];
}
