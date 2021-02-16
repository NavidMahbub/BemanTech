<?php

namespace App\Models;

use App\BaseModel;
use Cviebrock\EloquentSluggable\Sluggable;

class ContentCategory extends BaseModel
{
    use Sluggable;

    protected $fillable = [
        'title',
        'body',
        'image',
        'order',
        'has_child',
        'status'
    ];

    protected $hidden = [

    ];

    public static $rules = [
        'title' => 'required',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
