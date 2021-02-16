<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Routing\Controller;
use App\DataTables\UserDataTable;

class UserController extends Controller
{
    public function index(UserDatatable $datatable)
    {
        return $datatable->render('admin.user.index');
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function edit($id)
    {
        $dataId = $id;

        $user = User::find($id);

        return view('admin.user.edit', compact('dataId', 'user'));
    }

    public function approve($id)
    {
        $user = User::find($id);

        if ($user->approved == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $user->approved = $status;
        $user->update();

        return redirect()->back();
    }
}
