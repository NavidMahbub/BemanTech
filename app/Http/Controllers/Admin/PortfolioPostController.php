<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PortfolioPostDataTable;
use Illuminate\Routing\Controller;

class PortfolioPostController extends Controller
{
    public function index(PortfolioPostDataTable $datatable)
    {
        return $datatable->render('admin.portfolio_post.index');
    }

    public function create()
    {
        return view('admin.portfolio_post.create');
    }

    public function edit($id)
    {
        $dataId = $id;

        return view('admin.portfolio_post.edit', compact('dataId'));
    }
}
