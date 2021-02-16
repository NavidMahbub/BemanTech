<?php

namespace App\Models;

use App\BaseModel;
use Cviebrock\EloquentSluggable\Sluggable;

class ItemCategory extends BaseModel
{
    use Sluggable;

    protected $fillable = [
        'title',
        'type',
        'status',
    ];

    protected $hidden = [

    ];

    public static $rules = [
        'title' => 'required',
        'type' => 'required',
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
