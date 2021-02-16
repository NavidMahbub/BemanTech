@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site') . ' - Gallery')

@section('content')

    {{--page cover--}}
    <div class="content_fullwidth">
        <div class="container">
            <div class="module mid" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url({{ asset('site/theme3/images/slide/01.jpg') }});">
                <h2>Gallery</h2>
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
                    @foreach($list as $item)
                        <div class="col-md-3" style="margin-top: 30px;">
                            <a class="gallery-image" href="{{ $item->image ? $item->image : asset('image/placeholder.jpg') }}">
                                <img width="100%;" src="{{ $item->image ? $item->image : asset('image/placeholder.jpg') }}" alt="{{ $item->title }}">
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="row" style="margin-top: 25px;">
                    <div class="col-md-12">
                        {!! $list->links() !!}
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
