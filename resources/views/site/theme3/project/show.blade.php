@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site') . ' - Project')

@section('content')

    {{--page cover--}}
    <div class="content_fullwidth">
        <div class="container">
            <div class="module mid" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url({{ asset('site/theme3/images/slide/01.jpg') }});">
                <h2>{{ $post->title }}</h2>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    {{--page container--}}
    <div class="container">

        {{--page content--}}
        <div style="width: 100%;">
            <div class="bootstrap-wrapper">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row" style="margin-top: 30px;">
                            <div class="col-md-12">
                                @if($post->image)
                                    <div style="width: 100%; height: 300px; background-image: url({{ $post->image ? $post->image : asset('image/placeholder.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
                                @endif
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
                                <div class="owl-carousel">
                                    <div class="blog-content-area" style="width: 100%; height: 300px; background-image: url({{ $post->image1 ? $post->image1 : asset('image/placeholder.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
                                    <div class="blog-content-area" style="width: 100%; height: 300px; background-image: url({{ $post->image2 ? $post->image2 : asset('image/placeholder.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
                                    <div class="blog-content-area" style="width: 100%; height: 300px; background-image: url({{ $post->image3 ? $post->image3 : asset('image/placeholder.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
                                    <div class="blog-content-area" style="width: 100%; height: 300px; background-image: url({{ $post->image4 ? $post->image4 : asset('image/placeholder.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
                                    <div class="blog-content-area" style="width: 100%; height: 300px; background-image: url({{ $post->image5 ? $post->image5 : asset('image/placeholder.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="right-box" style="margin-top: 25px;">
                            <h4>Projects</h4>
                            <div class="sidebar-nav">
                                <ul>
                                    @foreach($list as $item)
                                        <li><a style="color: #0b0b0b" href="{{ route('site.project.show', ['slug' => $item->slug]) }}">{{ $item->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

    </div>

    <div class="clearfix mar_top2"></div>

@stop

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/dmhendricks/bootstrap-grid-css@4.1.3/dist/css/bootstrap-grid.min.css" />
    <link rel="stylesheet" href="{{ asset('css/jquery.multipurpose_tabcontent.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
@stop

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.gallery-image').magnificPopup({type:'image'});
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
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
                        items:2
                    },
                    1000:{
                        items:3
                    }
                }
            });
        });
    </script>
@stop
