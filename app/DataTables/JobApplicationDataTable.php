<?php

namespace App\DataTables;

use App\Models\Job;
use Yajra\DataTables\Services\DataTable;

// models
use App\Models\JobApplication;

class JobApplicationDataTable extends DataTable
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
                return view('admin.job_application._action', compact('data'))->render();
            })
            ->editColumn('created_at',  function($data) {
                return $data->created_at != null ? $data->created_at->format('d/m/Y') : $data->created_at;
            })
            ->editColumn('updated_at',  function($data) {
                return $data->updated_at != null ? $data->updated_at->format('d/m/Y') : $data->updated_at;
            })
            ->editColumn('job_id',  function($data) {
                return Job::find($data->job_id)->title;
            });
    }

    // Query source of datatable.
    public function query(JobApplication $model)
    {
        return $model->newQuery()->select('id', 'job_id', 'name' , 'email', 'created_at');
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
            'job_id',
            'name' ,
            'email',
            'created_at'
        ];
    }

    // Get filename for export.
    protected function filename()
    {
        return 'Job_' . date('YmdHis');
    }
}
