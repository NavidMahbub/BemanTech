<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\DataTables\PortfolioCategoryDataTable;

class PortfolioCategoryController extends Controller
{
    public function index(PortfolioCategoryDatatable $datatable)
    {
        return $datatable->render('admin.portfolio_category.index');
    }

    public function create()
    {
        return view('admin.portfolio_category.create');
    }

    public function edit($id)
    {
        $dataId = $id;

        return view('admin.portfolio_category.edit', compact('dataId'));
    }
}
