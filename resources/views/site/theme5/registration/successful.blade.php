@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')
    <div class="container" style="margin: 40px auto;">
        <div class="bksp_form">
            <div class="bksp_form_inner">
                <div class="row">
                    <div class="col-sm-12" style="margin-top: 20px; text-align: center;">
                        <div style="width: 760px; margin: 0 auto;" class="text-center">
                            <h1><img style="margin-right: 275px; height: 90px; width: 220px;" class="logo form_logo" src="{{ $setting_site->logo }}" alt="LOGO"></h1>
                        </div>
                    </div>
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
    @if(Session::has('success'))
        <script>
            Swal.fire(
                'Success!',
                '{{ Session::get('success') }}',
                'success'
            )
        </script>
    @endif
    @if(Session::has('error'))
        <script>
            Swal.fire(
                'Error!',
                '{{ Session::get('error') }}',
                'error'
            )
        </script>
    @endif
    <script src="{{ asset('js/registration.js') }}"></script>
@stop