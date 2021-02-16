<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\DataTables\JobPostDataTable;

class JobPostController extends Controller
{
    public function index(JobPostDatatable $datatable)
    {
        return $datatable->render('admin.job_post.index');
    }

    public function create()
    {
        return view('admin.job_post.create');
    }

    public function edit($id)
    {
        $dataId = $id;

        return view('admin.job_post.edit', compact('dataId'));
    }
}
