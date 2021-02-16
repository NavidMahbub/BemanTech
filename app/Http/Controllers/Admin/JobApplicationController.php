<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\DataTables\JobApplicationDataTable;

class JobApplicationController extends Controller
{
    public function index(JobApplicationDatatable $datatable)
    {
        return $datatable->render('admin.job_application.index');
    }

    public function create()
    {
        return view('admin.job_application.create');
    }

    public function edit($id)
    {
        $dataId = $id;

        return view('admin.job_application.edit', compact('dataId'));
    }
}
