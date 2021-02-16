<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;

// models
use App\Models\ProjectPost;

class ProjectPostDataTable extends DataTable
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
                return view('admin.project_post._action', compact('data'))->render();
            })
            ->editColumn('created_at',  function($data) {
                return $data->created_at->format('d/m/Y');
            })
            ->editColumn('updated_at',  function($data) {
                return $data->updated_at->format('d/m/Y');
            });
    }

    // Query source of datatable.
    public function query(ProjectPost $model)
    {
        return $model->newQuery()->select('id', 'title', 'created_at', 'updated_at');
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
            'title',
            'created_at',
            'updated_at'
        ];
    }

    // Get filename for export.
    protected function filename()
    {
        return 'ProjectPost_' . date('YmdHis');
    }
}
