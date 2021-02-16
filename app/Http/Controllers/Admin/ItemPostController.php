<?php

namespace App\Http\Controllers\Admin;

use App\Models\ItemCategory;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\DataTables\ItemPostDataTable;

class ItemPostController extends Controller
{
    public function index($category_id)
    {
        $datatable = new ItemPostDataTable($category_id);

        Session::put('item_category_id', $category_id);

        $category = ItemCategory::find($category_id);

        return $datatable->render('admin.item_post.index', compact('category'));
    }

    public function create($category_id)
    {
        Session::put('item_category_id', $category_id);

        $category = ItemCategory::find($category_id);

        return view('admin.item_post.create', compact('category'));
    }

    public function edit($category_id, $id)
    {
        Session::put('item_category_id', $category_id);

        $dataId = $id;

        $category = ItemCategory::find($category_id);

        return view('admin.item_post.edit', compact('dataId', 'category'));
    }
}
