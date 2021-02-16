<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProjectPostDataTable;
use Illuminate\Routing\Controller;

class ProjectPostController extends Controller
{
    public function index(ProjectPostDataTable $datatable)
    {
        return $datatable->render('admin.project_post.index');
    }

    public function create()
    {
        return view('admin.project_post.create');
    }

    public function edit($id)
    {
        $dataId = $id;

        return view('admin.project_post.edit', compact('dataId'));
    }
}
