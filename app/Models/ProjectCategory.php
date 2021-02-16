<?php

namespace App\Models;

use App\BaseModel;
use Cviebrock\EloquentSluggable\Sluggable;

class ProjectCategory extends BaseModel
{
    use Sluggable;

    protected $fillable = [
        'title',
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
