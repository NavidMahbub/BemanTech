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
                <div class="col-md-12">
                    <div class="row">
                        @foreach($list as $item)
                            <div class="col-md-4 mix design Seo col-sm-6">
                                <div class="single-portfolio mb-30">
                                    <div class="portfolio-img">
                                        <a href="javascript:void(0)"><img src="{{ $item->image ? $item->image : asset('image/placeholder.jpg') }}" alt="" /></a>
                                    </div>
                                    <div class="portfolio-info">
                                        <h2 class="text-white">{{ $item->title }}</h2>
                                        <div class="portfolio-icon">
                                            <a class="image-link" href="{{ $item->image ? $item->image : asset('image/placeholder.jpg') }}"><i class="fa fa-plus"></i></a>
                                            <a href="{{ route('site.item.post.show', ['category_slug' => $category->slug, 'post_slug' => $item->slug]) }}"><i class="fa fa-eye"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-12">
                            {!! $list->links() !!}
                        </div>
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
