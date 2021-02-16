<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\DataTables\BlogCategoryDataTable;

class BlogCategoryController extends Controller
{
    public function index(BlogCategoryDatatable $datatable)
    {
        return $datatable->render('admin.blog_category.index');
    }

    public function create()
    {
        return view('admin.blog_category.create');
    }

    public function edit($id)
    {
        $dataId = $id;

        return view('admin.blog_category.edit', compact('dataId'));
    }
}
