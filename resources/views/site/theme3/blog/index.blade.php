@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site') . ' - Blog')

@section('content')

    {{--page cover--}}
    <div class="content_fullwidth">
        <div class="container">
            <div class="module mid" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url({{ asset('site/theme3/images/slide/01.jpg') }});">
                <h2>{!! $category->title !!}</h2>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

@stop

@section('style')
@stop

@section('script')
@stop
