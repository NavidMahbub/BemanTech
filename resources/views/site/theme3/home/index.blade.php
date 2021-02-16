@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')

    @include('site.theme3.widgets.home.widget1')
    @include('site.theme3.widgets.home.widget0')
    @include('site.theme3.widgets.home.widget2')
    @include('site.theme3.widgets.home.widget3')
    @include('site.theme3.widgets.home.widget4')

@stop

@section('style')
@stop

@section('script')
@stop
