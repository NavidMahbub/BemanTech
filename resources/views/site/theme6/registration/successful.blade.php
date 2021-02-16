@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')
    <div class="container" style="margin: 40px auto;">
        <div class="bksp_form">
            <div class="bksp_form_inner">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 style="margin: 0">Payment Form</h3>
                    </div>
                    <div class="col-md-12 text-center">
                        <h4 class="title" style="margin-top: 30px;">
                            Your registration has been successfully completed.
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('style')
@stop

@section('script')
    @if(Session::has('error'))
        <script>
            Swal.fire(
                'Error!',
                '{{ Session::get('error') }}',
                'error'
            )
        </script>
    @endif
@stop