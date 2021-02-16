<?php

namespace App\Models;

use App\BaseModel;
use Cviebrock\EloquentSluggable\Sluggable;

class PortfolioPost extends BaseModel
{
    use Sluggable;

    protected $fillable = [
        'title',
        'body',
        'image',
        'status',
        'portfolio_category_id'
    ];

    protected $hidden = [

    ];

    public static $rules = [
        'title' => 'required',
        'portfolio_category_id' => 'required'
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
