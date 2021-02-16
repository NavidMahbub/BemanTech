@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')
    @php
        $sliders =  \App\Models\Slider::where('status', 1)->get();
        $galleries =  \App\Models\Gallery::where('status', 1)->get()->take(8);
        $about_aab = \App\Models\ContentCategory::where('slug', 'about-aab')->first();
        $featured_post = \App\Models\ContentCategory::where('slug', 'featured-post')->first();
        $registrations = \App\Models\Registration::with('user')->where('approved', 1)->get();
        $blogs = \App\Models\BlogPost::with('author')->where('status', 1)->where('approved', 1)->get()->take(10);
    @endphp
    <div class="clearfix"></div>
    <main role="main">
        <div class="clearfix"></div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="4000" style="margin-top: -65px;">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                @foreach($sliders as $slider_index => $slider)
                    <div class="carousel-item {{ $slider_index == 0 ? 'active' : '' }}">
                        <img src="{{ $slider->image }}" class="d-block w-100" alt="{{ $slider->title }}">
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="about">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('site.content.post.index', ['category_slug' => 'about-aab']) }}">
                                    <h2 class="card-title">About AAB</h2>
                                    <p class="card-text">
                                        {!! substr($about_aab->body, 0, 500) !!} [..]
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="reg_button">
                        <a href="{{ url('/registration') }}">
                            <span class="flash-button">become a member</span>
                        </a>
                        <a href="{{ url('/login') }}" style="margin-top: 50px;">
                            <span class="flash-button" style="margin-top: 50px;">Login Here</span>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="blog">
                        <div class="card">
                            <div class="card-body">
                                <a>
                                    <h2 class="card-title">Featured Post</h2>
                                </a>
                                @foreach($blogs as $blog)
                                    <a href="{{ route('site.blog.show', ['slug' => $blog->slug]) }}">
                                        <h4>{!! $blog->title !!}</h4>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <h2 class="highlight_title">Image Galley</h2>
                </div>
                <div class="col-sm-6">
                    <button type="button" class="btn btn-outline-success float-right btn_gallery">
                        <a href="{{ route('site.gallery.index') }}">More Image</a>
                    </button>
                </div>
                <div class="row games_hilights">
                    @foreach($galleries as $item)
                        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="{{ $item->image ? $item->image : asset('image/placeholder.jpg') }}" data-target="#image-gallery">
                                <img class="img-thumbnail" src="{{ $item->image ? $item->image : asset('image/placeholder.jpg') }}" alt="{{ $item->title }}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="member_list_body">
            <div class="container">
                <div class="row">
                    <div class="member_list">
                        <h2>Members already registerd!</h2>
                        @foreach($registrations as $registration)
                            <img src="{{ json_decode($registration->data)->image ? url('storage/' . json_decode($registration->data)->image) : asset('image/avatar.jpg') }}" alt="{{ $registration->user->name }}"
                                 title="{{ $registration->user->name }}" class="rounded-circle">
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-outline-success reg_button">
                        <a href="{{ url('/registration') }}">register now</a>
                    </button>
                </div>
            </div>
        </div>
@stop

@section('style')
@stop

@section('script')
@stop
