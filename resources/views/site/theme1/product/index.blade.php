@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site') . ' - Product')

@section('content')

    {{--page cover--}}
    <div class="breadcrumb-area bg-color ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-title text-center">
                        <h1>Product</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('style')
@stop

@section('script')
@stop
