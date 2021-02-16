<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\DataTables\ProjectCategoryDataTable;

class ProjectCategoryController extends Controller
{
    public function index(ProjectCategoryDatatable $datatable)
    {
        return $datatable->render('admin.project_category.index');
    }

    public function create()
    {
        return view('admin.project_category.create');
    }

    public function edit($id)
    {
        $dataId = $id;

        return view('admin.project_category.edit', compact('dataId'));
    }
}
