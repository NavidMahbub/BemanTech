<?php

namespace App\Http\Controllers\Site;

use App\Models\Gallery;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function index()
    {
        // galleries
        $list = Gallery::where('status', 1)->paginate(16);

        return view('site.' . config('cms.theme') . '.gallery.index', compact('list'));
    }
}
