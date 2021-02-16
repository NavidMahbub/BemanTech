<?php

namespace App\Http\Controllers\Site;

use App\Models\Slider;
use App\Models\ContentCategory;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('site.' . config('cms.theme') . '.home.index');
    }
    
}
