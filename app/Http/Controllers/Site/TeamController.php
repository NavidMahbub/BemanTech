<?php

namespace App\Http\Controllers\Site;

use App\Models\Team;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function index()
    {
        // teams
        $teams = Team::where('status', 1)->orderBy('order', 'asc')->get();

        return view('site.' . config('cms.theme') . '.team.index', compact('teams'));
    }
}
