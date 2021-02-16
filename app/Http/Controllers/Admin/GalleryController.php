<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\DataTables\GalleryDataTable;

class GalleryController extends Controller
{
    public function index(GalleryDatatable $datatable)
    {
        return $datatable->render('admin.gallery.index');
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function edit($id)
    {
        $dataId = $id;

        return view('admin.gallery.edit', compact('dataId'));
    }
}
