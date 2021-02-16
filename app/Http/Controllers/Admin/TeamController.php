<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\DataTables\TeamDataTable;

class TeamController extends Controller
{
    public function index(TeamDatatable $datatable)
    {
        return $datatable->render('admin.team.index');
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function edit($id)
    {
        $dataId = $id;

        return view('admin.team.edit', compact('dataId'));
    }
}
