<?php

namespace App\Models;

use App\BaseModel;
use Cviebrock\EloquentSluggable\Sluggable;

class PortfolioCategory extends BaseModel
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
