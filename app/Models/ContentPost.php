<?php

namespace App\Models;

use App\BaseModel;
use Cviebrock\EloquentSluggable\Sluggable;

class ContentPost extends BaseModel
{
    use Sluggable;

    protected $fillable = [
        'title',
        'body',
        'image',
        'order',
        'status',
        'content_category_id'
    ];

    protected $hidden = [

    ];

    protected $casts = [
        'content_category_id' => 'integer'
    ];

    public static $rules = [
        'title' => 'required',
        'content_category_id' => 'required'
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
