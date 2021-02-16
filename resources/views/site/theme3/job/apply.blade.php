@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site') . ' - Apply')

@section('content')

    {{--page cover--}}
    <div class="content_fullwidth">
        <div class="container">
            <div class="module mid" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url({{ asset('site/theme3/images/slide/01.jpg') }});">
                <h2>Apply: {{ $post->title }}</h2>
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

                                    <div class="plvr">
                                        {!! Form::open(['url' => route('site.job.apply.submit', ['slug' => $post->slug]), 'method' => 'POST', 'files' => 'true']) !!}
                                            <input id="job_id" name="job_id" value="{{ $post->id }}" type="hidden">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input id="name" name="name" value="{{ old('name') }}" type="text" class="form-control" placeholder="Enter your name.">
                                                @if($errors->has('name'))
                                                    <p class="help-block" style="color: red;">{!! $errors->first('name') !!}</p>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input id="email" name="email" value="{{ old('email') }}" type="text" class="form-control" placeholder="Enter your email.">
                                                @if($errors->has('email'))
                                                    <p class="help-block" style="color: red;">{!! $errors->first('email') !!}</p>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input id="address" name="address" value="{{ old('address') }}" type="text" class="form-control" placeholder="Enter your address.">
                                                @if($errors->has('address'))
                                                    <p class="help-block" style="color: red;">{!! $errors->first('address') !!}</p>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="contact_no">Contact No.</label>
                                                <input id="contact_no" name="contact_no" value="{{ old('contact_no') }}" type="text" class="form-control" placeholder="Enter your contact no.">
                                                @if($errors->has('contact_no'))
                                                    <p class="help-block" style="color: red;">{!! $errors->first('contact_no') !!}</p>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="resume">Resume</label>
                                                <input id="resume" name="resume" type="file">
                                                @if($errors->has('resume'))
                                                    <p class="help-block" style="color: red;">{!! $errors->first('resume') !!}</p>
                                                @endif
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        {!! Form::close() !!}
                                    </div>

                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="right-box" style="margin-top: 25px;">
                            <h4>Portfolios</h4>
                            <div class="sidebar-nav">
                                <ul>
                                    @foreach($list as $item)
                                        <li><a style="color: #0b0b0b" href="{{ route('site.job.show', ['slug' => $item->slug]) }}">{{ $item->title }}</a></li>
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
    @if(Session::has('message'))
        <script>
            toastr.success(`{{ Session::get('message') }}`)
        </script>
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.gallery-image').magnificPopup({type:'image'});
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
@stop
