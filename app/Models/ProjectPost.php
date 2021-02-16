<?php

namespace App\Models;

use App\BaseModel;
use Cviebrock\EloquentSluggable\Sluggable;

class ProjectPost extends BaseModel
{
    use Sluggable;

    protected $fillable = [
        'title',
        'body',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
        'status',
        'project_category_id'
    ];

    protected $hidden = [

    ];

    public static $rules = [
        'title' => 'required',
        'project_category_id' => 'required'
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
