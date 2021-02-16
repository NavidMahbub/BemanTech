@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')
    <div class="container" style="margin-top: 60px !important;">
        <div class="row" style="margin-bottom: 30px;">
            @foreach($list as $item)
                <div class="col-md-4 mb-4" style="cursor: pointer; max-width: 33.33% !important;">
                    @if(request()->route()->parameter('item') == 'photo-gallery')
                        <a class="image-link" href="{{ $item->image ? $item->image : url('image/placeholder.jpg') }}">
                            <div class="media-image">
                                <img style="width: 100%; height: 250px;" src="{{ $item->image ? $item->image : url('image/placeholder.jpg') }}" alt="{{ $item->title }}" class="img-fluid">
                                <div class="media-image-body">
                                    <h2 class="font-secondary text-uppercase">{{ $item->title }}</h2>
                                    <p>Posted by <span style="color:#66BC51;">Admin</span></p>
                                </div>
                            </div>
                        </a>
                    @elseif(request()->route()->parameter('item') == 'video-gallery')
                        <a class="video-link" href="{{ $item->body }}">
                            <div class="media-image">
                                <img style="width: 100%; height: 250px;" src="{{ $item->image ? $item->image : url('image/placeholder.jpg') }}" alt="{{ $item->title }}" class="img-fluid">
                                <div class="media-image-body" style="margin-top: -10px;">
                                    <h2 class="font-secondary text-uppercase">{{ $item->title }}</h2>
                                    <p>Posted by <span style="color:#66BC51;">Admin</span></p>
                                </div>
                            </div>
                        </a>
                    @else
                        <div onclick="window.location.href='{{ route("site.item.post.show", ["category_slug" => $category->slug, "post_slug" => $item->slug]) }}'">
                            <div class="media-image">
                                <img src="{{ $item->image ? $item->image : url('image/placeholder.jpg') }}" alt="{{ $item->title }}" class="img-fluid">
                                <div class="media-image-body">
                                    <h2 class="font-secondary text-uppercase">{{ $item->title }}</h2>
                                    <p>Posted by <span style="color:#66BC51;">Admin</span></p>
                                    <p>{!! substr($item->body, 0, 80) !!}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
        <div class="row" style="margin-bottom: 30px;">
            <div class="col-md-12">
                <nav>
                    {!! $list->links() !!}
                </nav>
            </div>
        </div>
    </div>
@stop

@section('style')
    <style>
        .col-md-3 {
            max-width: 22% !important;
        }
        .col-md-4 {
            max-width: 29.7% !important;
        }
    </style>
@stop

@section('script')
@stop
