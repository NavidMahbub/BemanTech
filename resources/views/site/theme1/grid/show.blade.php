@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')

    {{--page cover--}}
    <div class="breadcrumb-area bg-color ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-title text-center">
                        <h1>{!! $post->title !!}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--page body--}}
    <div class="blog-area ptb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <div class="blog-content-area" style="font-size: 16px;">
                        {!! $post->body !!}
                    </div>
                    <hr>
                    <p class="post-meta" style=" margin-top: 20px;">
                        Published: {{ $post->created_at->diffForHumans() }}, By <a href="javascript:void(0)" class="post-author">Admin</a>
                    </p>
                </div>
                <div class="col-md-3 col-sm-12 mt-sm-50">
                    <div class="blog-widget">
                        <div class="widget-title">
                            <h3>{{ $category->title }}</h3>
                        </div>
                        <ul class="list-item">
                            @foreach($list as $item)
                                <li><a href="{{ route('site.item.post.show', ['category_slug' => $category->slug, 'post_slug' => $item->slug]) }}">{{ $item->title }}</a></li>
                            @endforeach
                        </ul>
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
