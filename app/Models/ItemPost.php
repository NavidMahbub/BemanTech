<?php

namespace App\Models;

use App\BaseModel;
use Cviebrock\EloquentSluggable\Sluggable;

class ItemPost extends BaseModel
{
    use Sluggable;

    protected $fillable = [
        'title',
        'body',
        'image',
        'status',
        'item_category_id'
    ];

    protected $hidden = [

    ];

    protected $casts = [
        'item_category_id' => 'integer'
    ];

    public static $rules = [
        'item_category_id' => 'required'
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
