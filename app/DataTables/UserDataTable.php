<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;

// models
use App\User;

class UserDataTable extends DataTable
{
    public function __construct()
    {
        //
    }

    // Build datatable.
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', function($data) {
                return view('admin.user._action', compact('data'))->render();
            })
            ->addColumn('status', function($data) {
                if ($data->approved) {
                    return 'Active';
                } else {
                    return 'InActive';
                }
            })
            ->addColumn('type', function($data) {
                if ($data->type == 2) {
                    return 'Accountant';
                } else if ($data->type == 3) {
                    return 'Field Admin';
                } else {
                    return 'Data Entry';
                }
            })
            ->editColumn('created_at',  function($data) {
                return $data->created_at->format('d/m/Y');
            })
            ->editColumn('updated_at',  function($data) {
                return $data->updated_at->format('d/m/Y');
            });
    }

    // Query source of datatable.
    public function query(User $model)
    {
        return $model->newQuery()->whereIn('type', [2, 3, 4])->select('id', 'name', 'email', 'approved', 'code', 'type','created_at', 'updated_at');
    }

    // Html builder.
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '100px'])
            ->parameters($this->getBuilderParameters());
    }

    // Get columns
    protected function getColumns()
    {
        return [
            'name',
            'type',
            'code',
            'email',
            'status'
        ];
    }

    // Get filename for export.
    protected function filename()
    {
        return 'User_' . date('YmdHis');
    }
}
