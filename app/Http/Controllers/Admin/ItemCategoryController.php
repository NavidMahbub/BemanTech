<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\DataTables\ItemCategoryDataTable;

class ItemCategoryController extends Controller
{
    public function index(ItemCategoryDataTable $datatable)
    {
        return $datatable->render('admin.item_category.index');
    }

    public function create()
    {
        return view('admin.item_category.create');
    }

    public function edit($id)
    {
        $dataId = $id;

        return view('admin.item_category.edit', compact('dataId'));
    }
}
