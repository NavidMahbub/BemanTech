<?php

namespace App\Http\Controllers\Site;

use App\Models\Download;
use App\Http\Controllers\Controller;

class DownloadController extends Controller
{
    public function index()
    {
        // galleries
        $list = Download::where('status', 1)->paginate(15);

        return view('site.' . config('cms.theme') . '.download.index', compact('list'));
    }
}
