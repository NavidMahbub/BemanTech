@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site') . ' - Contact')

@section('content')

    {{--page cover--}}
    <div class="content_fullwidth">
        <div class="container">
            <div class="module mid" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url({{ asset('site/theme3/images/slide/01.jpg') }});">
                <h2>Contact</h2>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    {{--page container--}}
    <div class="container">

        {{--page content--}}
        <div class="content_left">
            <iframe src="{{ $setting_contact->map_url }}" frameborder="0" style="border:0; width: 100% !important; height: 450px !important;" allowfullscreen></iframe>
        </div>

        {{--right sidebar--}}
        <div class="right_sidebar">
            <div class="right-box">
                <div class="sidebar-nav">
                    <h2>Contact Information</h2>
                    <article class="my-text">
                        <p>Address: {{ $setting_contact->address }}</p>
                        <p>Phone: {{ $setting_contact->primary_phone }} {{ $setting_contact->secondary_phone }}</p>
                        <p>Email: {{ $setting_contact->primary_email }} {{ $setting_contact->secondary_email }}</p>
                        <p>Facebook: {{ $setting_contact->facebook }}</p>
                        <p>Twitter: {{ $setting_contact->twitter }}</p>
                    </article>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

    </div>

    <div class="clearfix mar_top2"></div>

@stop

@section('style')
@stop

@section('script')
@stop
