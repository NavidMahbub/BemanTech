<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

// models
use App\Models\BlogPost;
use App\Models\BlogCategory;

class BlogController extends Controller
{
    public function index()
    {
        // list
        $list = BlogPost::with(['author', 'category'])->where('approved', 1)->paginate(5);

        return view('site.' . config('cms.theme') . '.blog.index', compact('list'));
    }

    public function show($item_slug)
    {
        // post
        $item = BlogPost::with(['author', 'category'])->where('slug', $item_slug)->first();

        return view('site.' . config('cms.theme') . '.blog.show', compact('item'));
    }
}
