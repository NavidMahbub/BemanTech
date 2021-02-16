<?php

namespace App\Models;

use App\BaseModel;

class Download extends BaseModel
{
    protected $fillable = [
        'title',
        'file',
        'status'
    ];

    protected $hidden = [

    ];

    public static $rules = [
        'title' => 'required',
        'file' => 'required'
    ];
}
