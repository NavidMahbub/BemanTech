@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site') . ' - Contact')

@section('content')

    {{--page cover--}}
    <div class="breadcrumb-area bg-color ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-title text-center">
                        <h1>Contact</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-area ptb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 mt-sm-50">
                    <div class="blog-widget">
                        <iframe src="{{ $setting_contact->map_url }}" frameborder="0" style="border:0; width: 100% !important; height: 450px !important;" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="blog-content-area">
                        <h4 style="color: #444444; font-size: 15px; font-weight: 700; margin-bottom: 20px; text-transform: uppercase;">Contact Information</h4>
                        <div class="address">
                            <ul class="list-unstyled contact">
                                <li><p><strong><i class="fa fa-map-marker"></i> </strong> {{ $setting_contact->address }}</p></li>
                                <li><p><strong><i class="fa fa-envelope"></i></strong> {{ $setting_contact->primary_email }}</p></li>
                                <li><p><strong><i class="fa fa-envelope"></i></strong> {{ $setting_contact->secondary_email }}</p></li>
                                <li><p><strong><i class="fa fa-phone"></i></strong> {{ $setting_contact->primary_phone }}</p></li>
                                <li><p><strong><i class="fa fa-phone"></i></strong> {{ $setting_contact->secondary_phone }}</p></li>
                                <li><p><strong><i class="fa fa-print"></i> </strong> {{ $setting_contact->primary_fax }}</p></li>
                                <li><p><strong><i class="fa fa-print"></i> </strong> {{ $setting_contact->secondary_fax }}</p></li>
                                <li><p><strong><i class="fa fa-skype"></i> </strong> {{ $setting_contact->skype }}</p></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('style')
@stop

@section('script')
@stop
