@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')

    {{--page cover--}}
    <div class="breadcrumb-area bg-color ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-title text-center">
                        <h1>{!! $category->title !!}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-area ptb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-12">
                    @foreach($list as $item)
                        <div class="blog-content-area pb-40">
                            <div class="post-content">
                                <h2 class="post-title">
                                    <a href="{{ route('site.item.post.show', ['category_slug' => $category->slug, 'post_slug' => $item->slug]) }}">{{ $item->title }}</a>
                                </h2>
                                <ul class="post-meta">
                                    <li>{{ $item->created_at->diffForHumans() }}</li>
                                    <li>By <a href="javascript:void(0)">Admin</a></li>
                                </ul>
                                <p>
                                    {!! substr($item->body, 0, 250) !!}
                                </p>
                                <a href="{{ route('site.item.post.show', ['category_slug' => $category->slug, 'post_slug' => $item->slug]) }}" class="more">Read more <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    @endforeach
                    {!! $list->links() !!}
                </div>
            </div>
        </div>
    </div>

@stop

@section('style')
@stop

@section('script')
@stop
