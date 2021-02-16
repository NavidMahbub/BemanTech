@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site') . ' - Portfolio')

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
                                <div>
                                    <p style="font-size: 16px;">
                                        {!! $post->body !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="right-box" style="margin-top: 25px;">
                            <h4>Portfolios</h4>
                            <div class="sidebar-nav">
                                <ul>
                                    @foreach($list as $item)
                                        <li><a style="color: #0b0b0b" href="{{ route('site.portfolio.show', ['slug' => $item->slug]) }}">{{ $item->title }}</a></li>
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
@stop

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.gallery-image').magnificPopup({type:'image'});
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
@stop
