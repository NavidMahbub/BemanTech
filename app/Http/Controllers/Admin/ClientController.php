<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\DataTables\ClientDataTable;

class ClientController extends Controller
{
    public function index(ClientDatatable $datatable)
    {
        return $datatable->render('admin.client.index');
    }

    public function create()
    {
        return view('admin.client.create');
    }

    public function edit($id)
    {
        $dataId = $id;

        return view('admin.client.edit', compact('dataId'));
    }
}
