<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CommonDataHelper;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    use CommonDataHelper;
    public function index()
    {
        $this->shareRegistrationData();
        $this->shareBlogData();
        return view('admin.dashboard.index');
    }
}
