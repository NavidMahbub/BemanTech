<?php

namespace App\Models;

use App\BaseModel;

class SettingSeo extends BaseModel
{
    protected $fillable = [
        'title',
        'image',
        'author',
        'description'
    ];

    protected $hidden = [

    ];

    public static $rules = [
        'title' => 'required',
        'image' => 'required',
        'author' => 'required',
        'description' => 'required'
    ];
}
