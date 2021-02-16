<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ContentPostDataTable;
use App\Models\ContentCategory;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class ContentPostController extends Controller
{
    public function index($category_id)
    {
        $content_category = ContentCategory::find($category_id);

        if ((int) $content_category->has_child == 1)
        {
            $datatable = new ContentPostDataTable($category_id);

            Session::put('content_category_id', $category_id);

            return $datatable->render('admin.content_post.index');
        }
        else
        {
            Session::put('content_category_id', $category_id);

            $dataId = $category_id;

            return view('admin.content_post.post', compact('dataId'));
        }
    }

    public function create($category_id)
    {
        Session::put('content_category_id', $category_id);

        return view('admin.content_post.create');
    }

    public function edit($category_id, $id)
    {
        Session::put('content_category_id', $category_id);

        $dataId = $id;

        return view('admin.content_post.edit', compact('dataId'));
    }
}
