<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\DataTables\ContentCategoryDataTable;

class ContentCategoryController extends Controller
{
    public function index(ContentCategoryDatatable $datatable)
    {
        return $datatable->render('admin.content_category.index');
    }

    public function create()
    {
        return view('admin.content_category.create');
    }

    public function edit($id)
    {
        $dataId = $id;

        return view('admin.content_category.edit', compact('dataId'));
    }
}
