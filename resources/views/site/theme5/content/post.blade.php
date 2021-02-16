@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')
    @if($post->image)
        <div class="about_us">
            <img src="{{ $post->image }}" alt="about-bksp-banner2" class="img-fluid">
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="about_content">
                <p>
                    {!! $post->body !!}
                </p>
            </div>
        </div>
    </div>
@stop

@section('style')
@stop

@section('script')
@stop
