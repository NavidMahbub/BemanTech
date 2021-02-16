@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site') . ' - Job Post')

@section('content')

    {{--page cover--}}
    <div class="content_fullwidth">
        <div class="container">
            <div class="module mid" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url({{ asset('site/theme3/images/slide/01.jpg') }});">
                <h2>Job Post</h2>
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
                                        {!! Form::open(['url' => route('site.job.post.submit'), 'method' => 'POST', 'files' => 'true']) !!}
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input id="title" name="title" value="{{ old('title') }}" type="text" class="form-control" placeholder="Enter title.">
                                                @if($errors->has('title'))
                                                    <p class="help-block" style="color: red;">{!! $errors->first('title') !!}</p>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
                                                @if($errors->has('description'))
                                                    <p class="help-block" style="color: red;">{!! $errors->first('description') !!}</p>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="vacancy">Vacancy</label>
                                                <input id="vacancy" name="vacancy" value="{{ old('vacancy') }}" type="text" class="form-control" placeholder="Enter vacancy.">
                                                @if($errors->has('vacancy'))
                                                    <p class="help-block" style="color: red;">{!! $errors->first('vacancy') !!}</p>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="salary">Salary</label>
                                                <input id="salary" name="salary" value="{{ old('salary') }}" type="text" class="form-control" placeholder="Enter salary.">
                                                @if($errors->has('salary'))
                                                    <p class="help-block" style="color: red;">{!! $errors->first('salary') !!}</p>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="company_name">Company</label>
                                                <input id="company_name" name="company_name" value="{{ old('company_name') }}" type="text" class="form-control" placeholder="Enter company name.">
                                                @if($errors->has('company_name'))
                                                    <p class="help-block" style="color: red;">{!! $errors->first('company_name') !!}</p>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="country">Country</label>
                                                <input id="country" name="country" value="{{ old('country') }}" type="text" class="form-control" placeholder="Enter country.">
                                                @if($errors->has('country'))
                                                    <p class="help-block" style="color: red;">{!! $errors->first('country') !!}</p>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="person_name">Your Name</label>
                                                <input id="person_name" name="person_name" value="{{ old('person_name') }}" type="text" class="form-control" placeholder="Enter your name.">
                                                @if($errors->has('person_name'))
                                                    <p class="help-block" style="color: red;">{!! $errors->first('person_name') !!}</p>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Your Email</label>
                                                <input id="email" name="email" value="{{ old('email') }}" type="text" class="form-control" placeholder="Enter your email.">
                                                @if($errors->has('email'))
                                                    <p class="help-block" style="color: red;">{!! $errors->first('email') !!}</p>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="designation">Your Designation</label>
                                                <input id="designation" name="designation" value="{{ old('designation') }}" type="text" class="form-control" placeholder="Enter your designation.">
                                                @if($errors->has('designation'))
                                                    <p class="help-block" style="color: red;">{!! $errors->first('designation') !!}</p>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="expiry_date">Expiry Date</label>
                                                <input style="padding: 0 10px;" id="expiry_date" name="expiry_date" value="{{ old('expiry_date') }}" type="date" class="form-control" placeholder="Enter expiry date.">
                                                @if($errors->has('expiry_date'))
                                                    <p class="help-block" style="color: red;">{!! $errors->first('expiry_date') !!}</p>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="attachment">Attachment</label>
                                                <input id="attachment" name="attachment" type="file">
                                                @if($errors->has('attachment'))
                                                    <p class="help-block" style="color: red;">{!! $errors->first('attachment') !!}</p>
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
