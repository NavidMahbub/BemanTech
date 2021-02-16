@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site') . ' - Contact')

@section('content')

    <div class="bootstrap-wrapper" style="margin: 50px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 mt-sm-50">
                    <div class="blog-widget">
                        <iframe src="{{ $setting_contact->map_url }}" frameborder="0" style="border:0; width: 100% !important; height: 450px !important;" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="blog-content-area">
                        <h3><span class="color">Contact Information</span></h3>
                        <div class="address">
                            <ul class="list-unstyled contact">
                                <li><p><strong><i class="fa fa-map-marker"></i> </strong> <b>Address:</b> {{ $setting_contact->address ? $setting_contact->address : 'N/A' }}</p></li>
                                <li><p><strong><i class="fa fa-envelope"></i></strong> <b>Email 1:</b> {{ $setting_contact->primary_email ? $setting_contact->primary_email : 'N/A' }}</p></li>
                                <li><p><strong><i class="fa fa-envelope"></i></strong> <b>Email 2:</b>  {{ $setting_contact->secondary_email ? $setting_contact->secondary_email : 'N/A' }}</p></li>
                                <li><p><strong><i class="fa fa-phone"></i></strong> <b>Phone 1:</b>  {{ $setting_contact->primary_phone ? $setting_contact->primary_phone : 'N/A' }}</p></li>
                                <li><p><strong><i class="fa fa-phone"></i></strong> <b>Phone 2:</b>  {{ $setting_contact->secondary_phone ? $setting_contact->secondary_phone : 'N/A' }}</p></li>
                                <li><p><strong><i class="fa fa-print"></i> </strong> <b>Fax 1:</b>  {{ $setting_contact->primary_fax ? $setting_contact->primary_fax : 'N/A' }}</p></li>
                                <li><p><strong><i class="fa fa-print"></i> </strong> <b>Fax 2:</b>  {{ $setting_contact->secondary_fax ? $setting_contact->secondary_fax : 'N/A' }}</p></li>
                                <li><p><strong><i class="fa fa-skype"></i> </strong> <b>Skype:</b>  {{ $setting_contact->skype ? $setting_contact->skype : 'N/A' }}</p></li>
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
