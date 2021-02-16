@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site') . ' - Job')

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
                                <article class="my-text">
                                    <h1>{{ $post->title }}</h1>
                                    <p class="justifyfull"></p>
                                    <p>
                                        <span style="color: #383634;">
                                            <strong>Description:</strong> {!! $post->description !!}
                                        </span>
                                    </p>
                                    <p>
                                        <span style="color: #383634;">
                                            <strong>Vacancy:</strong> {!! $post->vacancy !!}
                                        </span>
                                    </p>
                                    <p>
                                        <span style="color: #383634;">
                                            <strong>Salary:</strong> {!! $post->salary !!}
                                        </span>
                                    </p>
                                    <p>
                                        <span style="color: #383634;">
                                            <strong>Company Name:</strong> {!! $post->company_name !!}
                                        </span>
                                    </p>
                                    <p>
                                        <span style="color: #383634;">
                                            <strong>Country:</strong> {!! $post->country !!}
                                        </span>
                                    </p>
                                    <p>
                                        <a style="margin-top: 20px; display: inline-block" class="read_more" href="{{ route('site.job.apply', ['slug' => $post->slug]) }}">Apply Now</a>
                                    </p>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="right-box" style="margin-top: 25px;">
                            <h4>Job List</h4>
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
