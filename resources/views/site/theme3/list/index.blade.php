@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site') . ' - Portfolio')

@section('content')

    {{--page cover--}}
    <div class="content_fullwidth">
        <div class="container">
            <div class="module mid" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url({{ asset('site/theme3/images/slide/01.jpg') }});">
                <h2>{{ $category->title }}</h2>
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
                    <div class="col-md-12">
                        <div class="row" style="margin-top: 30px;">
                            <div class="col-md-12">
                                @foreach($list as $item)
                                    <section class="post" style="margin: 40px 0; width: 100%;background: #efefef6e; padding: 30px;">
                                        <header class="post-header">
                                            <a href="{{ route('site.item.post.show', ['category_slug' => $category->slug, 'post_slug' => $item->slug]) }}"><h2 class="post-title">{{ $item->title }}</h2></a>
                                            <p class="post-meta" style="font-size: 16px">
                                                Published: {{ $item->created_at->diffForHumans() }}, By <a href="javascript:void(0)" class="post-author">Admin</a>
                                            </p>
                                        </header>
                                        <div class="post-description">
                                            <p style="font-size: 16px;">
                                                {!! substr($item->body, 0, 460) !!}
                                            </p>
                                            <p><a style="float: right; font-size: 15px;" href="{{ route('site.item.post.show', ['category_slug' => $category->slug, 'post_slug' => $item->slug]) }}">Read More</a></p>
                                        </div>
                                    </section>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {!! $list->links() !!}
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
