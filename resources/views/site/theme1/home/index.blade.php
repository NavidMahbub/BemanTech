@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')

    @include('site.theme1.widgets.home.widget1')

    @include('site.theme1.widgets.home.widget2')

    @include('site.theme1.widgets.home.widget7')

    @include('site.theme1.widgets.home.widget3')

    @include('site.theme1.widgets.home.widget4')

    @include('site.theme1.widgets.home.widget5')

    @include('site.theme1.widgets.home.widget6')

@stop

@section('style')
@stop

@section('script')
@stop
