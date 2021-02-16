@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-5 contact_col">
                <div class="contact_content">
                    <h2>Contact Us</h2>
                    <p>
                        <b>Bangladesh Krira Shikkha Protishtan (BKSP)</b><br>
                        {{ $setting_contact->address }}<br>
                        <b>Phone :</b> {{ $setting_contact->primary_phone }}, {{ $setting_contact->secondary_phone }}<br>
                        <b>Fax :</b> {{ $setting_contact->primary_fax }}, {{ $setting_contact->secondary_fax }}<br>
                        <b>E-mail :</b> {{ $setting_contact->primary_email }}, {{ $setting_contact->secondary_email }}<br>
                    </p>
                </div>
            </div>
            <div class="col-sm-7 contact_col">
                <div class="gmap">
                    <h2>Location in Google map</h2>
                    <iframe src="{{ $setting_contact->map_url }}" frameborder="0" style="border:0; width: 100% !important; height: 450px !important;" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
@stop

@section('style')
    <style>
        .col-md-3 {
            max-width: 21% !important;
        }
        .col-md-4 {
            max-width: 28.7% !important;
        }
    </style>
@stop

@section('script')
@stop
