<?php

namespace App\Models;

use App\BaseModel;
use Cviebrock\EloquentSluggable\Sluggable;

class BlogPost extends BaseModel
{
    use Sluggable;

    protected $fillable = [
        'title',
        'body',
        'image',
        'status',
        'blog_category_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $hidden = [

    ];

    public static $rules = [
        'title' => 'required',
        'blog_category_id' => 'required'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected static function boot()
    {
        parent::boot();

        /*static::saving(function ($model) {
            $model->created_by = auth()->user()->id;
        });

        static::updating(function ($model) {
            $model->updated_by = auth()->user()->id;
        });

        static::deleting(function ($model) {
            $model->deleted_by = auth()->user()->id;
        });*/
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\BlogCategory', 'blog_category_id');
    }
}
