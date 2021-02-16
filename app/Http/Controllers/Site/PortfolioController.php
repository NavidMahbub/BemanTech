<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

// models
use App\Models\PortfolioPost;
use App\Models\PortfolioCategory;

class PortfolioController extends Controller
{
    public function index()
    {
        // portfolio lists
        if (request()->has('category_id') && request()->get('category_id') != null)
        {
            $list = PortfolioPost::where('portfolio_category_id', request()->get('category_id'))->paginate(6);
        }
        else
        {
            $list = PortfolioPost::paginate(6);
        }

        // portfolio categories
        $categories = PortfolioCategory::where('status', 1)->get();

        return view('site.' . config('cms.theme') . '.portfolio.index', compact('list', 'categories'));
    }

    public function show($portfolio_slug)
    {
        // list
        $list = PortfolioPost::where('status', 1)->latest()->get()->take(10);

        // post
        $post = PortfolioPost::where('slug', $portfolio_slug)->first();

        if (empty($post))
        {
            abort(404);
        }

        return view('site.' . config('cms.theme') . '.portfolio.show', compact('list', 'post'));
    }
}
