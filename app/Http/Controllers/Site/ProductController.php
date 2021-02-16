<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

// models
use App\Models\ProductPost;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    public function index()
    {
        
        // if (request()->has('category_id') && request()->get('category_id') != null)
        // {
        //     $list = ProductPost::where('product_category_id', request()->get('category_id'))->paginate(6);
        // }
        // else
        // {
        //     $list = ProductPost::paginate(6);
        // }

        // // product categories
        // $categories = ProductCategory::where('status', 1)->get();

       // return view('site.' . config('cms.theme') . '.product.index', compact('list', 'categories'));


        return view('site.' . config('cms.theme') . '.product.index');
    }

    public function show($product_slug)
    {
        // list
        $list = ProductPost::where('status', 1)->latest()->get()->take(10);

        // post
        $post = ProductPost::where('slug', $product_slug)->first();

        if (empty($post))
        {
            abort(404);
        }

        return view('site.' . config('cms.theme') . '.product.show', compact('list', 'post'));
    }
}
