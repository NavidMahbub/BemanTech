<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

// models
use App\Models\ProjectPost;
use App\Models\ProjectCategory;

class ProjectController extends Controller
{
    public function index()
    {
        // project lists
        if (request()->has('category_id') && request()->get('category_id') != null)
        {
            $list = ProjectPost::where('project_category_id', request()->get('category_id'))->paginate(6);
        }
        else
        {
            $list = ProjectPost::paginate(6);
        }

        // project categories
        $categories = ProjectCategory::where('status', 1)->get();

        return view('site.' . config('cms.theme') . '.project.index', compact('list', 'categories'));
    }

    public function show($project_slug)
    {
        // list
        $list = ProjectPost::where('status', 1)->latest()->get()->take(10);

        // post
        $post = ProjectPost::where('slug', $project_slug)->first();

        if (empty($post))
        {
            abort(404);
        }

        return view('site.' . config('cms.theme') . '.project.show', compact('list', 'post'));
    }
}
