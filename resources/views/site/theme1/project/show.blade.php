@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site') . ' - Project')

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
                    <div class="owl-carousel">
                        <div class="blog-content-area" style="width: 100%; height: 300px; background-image: url({{ $post->image1 ? $post->image1 : asset('image/placeholder.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
                        <div class="blog-content-area" style="width: 100%; height: 300px; background-image: url({{ $post->image2 ? $post->image2 : asset('image/placeholder.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
                        <div class="blog-content-area" style="width: 100%; height: 300px; background-image: url({{ $post->image3 ? $post->image3 : asset('image/placeholder.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
                        <div class="blog-content-area" style="width: 100%; height: 300px; background-image: url({{ $post->image4 ? $post->image4 : asset('image/placeholder.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
                        <div class="blog-content-area" style="width: 100%; height: 300px; background-image: url({{ $post->image5 ? $post->image5 : asset('image/placeholder.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
                    </div>
                    @if($post->body)
                    <div class="blog-content-area mt-30">
                        @php
                            $data = json_decode($post->body);
                        @endphp
                        <div class="tab_wrapper demo">

                            <ul class="tab_list">
                                @foreach($data as $index1 => $datum)
                                    <li class="nav-item">
                                        <a class="{{ $index1 == 0 ? 'active' : '' }}" id="project_tab{{ $index1 }}">
                                            {!! $datum->key !!}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="content_wrapper">
                                @foreach($data as $index2 => $datum)
                                    <div class="tab_content {{ $index2 == 0 ? 'active' : '' }}">
                                        {!! $datum->value !!}
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-md-3 col-sm-12 mt-sm-50">
                    <div class="blog-widget">
                        <div class="widget-title">
                            <h3>Project</h3>
                        </div>
                        <ul class="list-item">
                            @foreach($list as $item)
                                <li><a href="{{ route('site.project.show', ['slug' => $item->slug]) }}">{{ $item->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('style')
    <link rel="stylesheet" href="{{ asset('css/jquery.multipurpose_tabcontent.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
@stop

@section('script')
    <script src="{{ asset('js/jquery.multipurpose_tabcontent.js') }}"></script>
    <script>
        $(".demo").champ({
            plugin_type :  "tab"
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                loop:true,
                margin:10,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                },
                nav: true,
                navText: ["<i style='padding: 10px 20px; font-size: 20px; background: #efefef;' class='fa fa-angle-left'></i>", "<i style='padding: 10px 20px; font-size: 20px; background: #efefef;' class='fa fa-angle-right'></i>"]
            });
        });
    </script>
@stop
