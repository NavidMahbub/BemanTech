@extends('layouts.app')

@section('site_title', 'Client')

@section('page_title')
    <div class="app-title">
        <div>
            <h1>Client List</h1>
        </div>
        <a href="{{ route('admin.client.create') }}" class="btn btn-primary icon-btn text-white"><i class="fa fa-plus-circle"></i>Create Client</a>
    </div>
@stop

@section('page_content')

    <div class="tile card" style="margin: 0; padding: 0">
        <div class="card-header">
            Client List
        </div>
        <div class="tile-body" style="padding: 40px; z-index: 1">

            {!! $dataTable->table(['class' => 'table table-hover table-bordered', 'style' => 'width: 100%;']) !!}

        </div>
    </div>

@stop

@section('script')

    <!-- datatable scripts -->
    <script src="{{ asset('admin/js/plugins/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/plugins/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/plugins/buttons.server-side.js') }}"></script>
    {!! $dataTable->scripts() !!}

    <!-- axion -->
    <script src="{{ asset('admin/plugins/axios/0.18.0/axios.min.js') }}" type="text/javascript"></script>

    <!-- Base url for ajax endpoint -->
    <script type="text/javascript">
        var ajax_url = `{{ env("APP_URL") }}/ajax/`;
    </script>

    <!-- delete clients -->
    <script>

        $('#dataTableBuilder tbody').on('click', '.delete', function (e) {

            // axios service
            let service = axios.create({
                baseURL: ajax_url,
                responseType: "json"
            });

            // client id
            let id = parseInt(this.dataset.did);

            // confirmation alert
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function(isConfirm) {

                // checking if confirmed
                if (isConfirm) {

                    // deleting client
                    deleteClient(id);

                }

            });

            // delete client
            function deleteClient(id) {
                service.delete(`client/${id}`)
                    .then(function (response) {

                        // response
                        let res = response.data;

                        // reloading datatable
                        window.LaravelDataTables["dataTableBuilder"].ajax.reload();

                        // success notification
                        toastr.success(res.message);

                    })
                    .catch(function (error) {

                        // error message
                        let message = error.response.data.message;

                        // error notification
                        toastr.error(message);

                    });
            }

        });

    </script>
@stop
