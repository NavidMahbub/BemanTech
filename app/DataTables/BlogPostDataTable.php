<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;

// models
use App\Models\BlogPost;

class BlogPostDataTable extends DataTable
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
                return view('admin.blog_post._action', compact('data'))->render();
            })
            ->editColumn('status',  function($data) {
                return $data->status == 1 ? 'Approved' : 'Pending';
            })
            ->editColumn('created_at',  function($data) {
                return $data->created_at->format('d/m/Y');
            })
            ->editColumn('updated_at',  function($data) {
                return $data->updated_at->format('d/m/Y');
            });
    }

    // Query source of datatable.
    public function query(BlogPost $model)
    {
        if (auth()->user()->type == 0) {
            return $model->newQuery()->select('id', 'title', 'approved as status', 'created_at', 'updated_at');
        } else {
            return $model->newQuery()->where('created_by', auth()->user()->id)->select('id', 'title', 'approved', 'created_at', 'updated_at');
        }
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
            'status',
            'created_at',
            'updated_at'
        ];
    }

    // Get filename for export.
    protected function filename()
    {
        return 'BlogPost_' . date('YmdHis');
    }
}
