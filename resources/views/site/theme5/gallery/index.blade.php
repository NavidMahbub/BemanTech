@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')
    <div class="gallery_head">
        <img src="{{ asset('site/theme5/front_end/images/gallery_banner.jpg') }}" alt="about-bksp-banner2" class="img-fluid">
    </div>
    <div class="container">
        <div class="row">
            <div class="row games_hilights">
                @foreach($list as $item)
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="{{ $item->image ? $item->image : asset('image/placeholder.jpg') }}" data-target="#image-gallery">
                            <img class="img-thumbnail" src="{{ $item->image ? $item->image : asset('image/placeholder.jpg') }}" alt="{{ $item->title }}">
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    {!! $list->links() !!}
                </div>
            </div>
        </div>
    </div>
@stop