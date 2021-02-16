<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

// models
use App\Models\ItemPost;
use App\Models\ItemCategory;

class ItemController extends Controller
{
    public function index($category_slug)
    {
        // category
        $category = ItemCategory::where('slug', $category_slug)->first();

        if (empty($category))
        {
            abort(404);
        }

        // list
        $list = ItemPost::where('item_category_id', $category->id)->paginate(9);

        if ($category->type == 1)
        {
            return view('site.' . config('cms.theme') . '.grid.index', compact('list', 'category'));
        }
        else
        {
            return view('site.' . config('cms.theme') . '.list.index', compact('list', 'category'));
        }
    }

    public function show($category_slug, $item_slug)
    {
        // category
        $category = ItemCategory::where('slug', $category_slug)->first();

        if (empty($category))
        {
            abort(404);
        }

        // list
        $list = ItemPost::where('item_category_id', $category->id)->latest()->get()->take(10);

        // post
        $post = ItemPost::where('item_category_id', $category->id)->where('slug', $item_slug)->first();

        if ($category->type == 1)
        {
            return view('site.' . config('cms.theme') . '.grid.show', compact('list', 'post', 'category'));
        }
        else
        {
            return view('site.' . config('cms.theme') . '.list.show', compact('list', 'post', 'category'));
        }
    }
}
