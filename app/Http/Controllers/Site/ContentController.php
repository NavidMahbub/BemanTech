<?php

namespace App\Http\Controllers\Site;

use App\Models\ContentCategory;
use App\Models\ContentPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    public function index($category_slug)
    {
        // category
        $category = ContentCategory::where('slug', $category_slug)->first();

        if (empty($category))
        {
            abort(404);
        }

        // checking if content category has child item
        if ($category->has_child)
        {
            // content lists
            $list = ContentPost::where('content_category_id', $category->id)->get();

            return view('site.' . config('cms.theme') . '.content.index', compact('list',  'category'));
        }
        else
        {
            // content post
            $post = $category;

            return view('site.' . config('cms.theme') . '.content.post', compact('post'));
        }
    }

    public function show($category_slug, $content_slug)
    {
        // category
        $category = ContentCategory::where('slug', $category_slug)->first();

        if (empty($category))
        {
            abort(404);
        }

        // list
        $list = ContentPost::where('content_category_id', $category->id)->get();

        // post
        $post = ContentPost::where('content_category_id', $category->id)->where('slug', $content_slug)->first();

        if (empty($post))
        {
            abort(404);
        }

        return view('site.' . config('cms.theme') . '.content.show', compact('post', 'list', 'category'));
    }
}
