<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\DataTables\SliderDataTable;

class SliderController extends Controller
{
    public function index(SliderDatatable $datatable)
    {
        return $datatable->render('admin.slider.index');
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function edit($id)
    {
        $dataId = $id;

        return view('admin.slider.edit', compact('dataId'));
    }
}
