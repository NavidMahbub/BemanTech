<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\DataTables\TeamDataTable;

class SettingUserController extends Controller
{
    public function profile()
    {
        return view('admin.setting.profile');
    }

    public function password()
    {
        return view('admin.setting.password');
    }
}
