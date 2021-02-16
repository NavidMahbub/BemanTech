<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TechnologyController extends Controller
{
    public function index()
    {
        return view('site.' . config('cms.theme') . '.technology.index');
    }
}
