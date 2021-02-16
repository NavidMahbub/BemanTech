<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\DataTables\JobListDataTable;

class JobListController extends Controller
{
    public function index(JobListDatatable $datatable)
    {
        return $datatable->render('admin.job_list.index');
    }

    public function create()
    {
        return view('admin.job_list.create');
    }

    public function edit($id)
    {
        $dataId = $id;

        return view('admin.job_list.edit', compact('dataId'));
    }
}
