<?php

namespace App\Models;

use App\BaseModel;
use Cviebrock\EloquentSluggable\Sluggable;

class Job extends BaseModel
{
    use Sluggable;

    protected $fillable = [
        'title',
        'description',
        'vacancy',
        'salary',
        'company_name',
        'country',
        'person_name',
        'email',
        'designation',
        'expiry_date',
        'attachment',
        'status',
        'type'
    ];

    protected $hidden = [

    ];

    public static $rules = [
        'title' => 'required',
        'vacancy' => 'required',
        'salary' => 'required',
        'company_name' => 'required',
        'country' => 'required',
        'person_name' => 'required',
        'email' => 'required',
        'designation' => 'required',
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
