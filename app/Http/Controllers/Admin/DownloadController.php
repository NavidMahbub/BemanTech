<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\DataTables\DownloadDataTable;

class DownloadController extends Controller
{
    public function index(DownloadDatatable $datatable)
    {
        return $datatable->render('admin.download.index');
    }

    public function create()
    {
        return view('admin.download.create');
    }

    public function edit($id)
    {
        $dataId = $id;

        return view('admin.download.edit', compact('dataId'));
    }
}
