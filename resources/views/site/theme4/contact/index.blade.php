@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')
    <tr>
        <td colspan="2" valign="top">
            <table width="1080" border="0">
                <tr>
                    <td valign="top" width="600" >
                        <table width="100%" border="0">
                            <tr valign="top">
                                <td style="line-height:25px; padding-left:30px"><p>
                                    <h1 style="font-size:22px; color:#66BC51;">
                                        <strong>Map</strong>
                                    </h1>
                                    <div class="bootstrap-wrapper">
                                        <div class="row" style="margin-bottom: 30px;">
                                            <div class="col-md-12">
                                                <iframe src="{{ $setting_contact->map_url }}" frameborder="0" style="border:0; width: 100% !important; height: 450px !important;" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td valign="top" width="400" >
                        <table width="100%" border="0">
                            <tr valign="top">
                                <td style="line-height:25px; padding-left:30px"><p>
                                    <h1 style="font-size:22px; color:#66BC51;">
                                        <strong>Contact Info</strong>
                                    </h1>
                                    <div class="bootstrap-wrapper">
                                        <div class="row" style="margin-bottom: 30px;">
                                            <div class="col-md-12">
                                                <div class="address">
                                                    <ul class="list-unstyled contact">
                                                        <li><p><strong>Address: </strong> {{ $setting_contact->address }}</p></li>
                                                        <li><p><strong>Email: </strong> {{ $setting_contact->primary_email }}, {{ $setting_contact->secondary_email }}</p></li>
                                                        <li><p><strong>Phone: </strong> {{ $setting_contact->primary_phone }}, {{ $setting_contact->secondary_phone }}</p></li>
                                                        <li><p><strong>Fax: </strong> {{ $setting_contact->primary_fax }}, {{ $setting_contact->secondary_fax }}</p></li>
                                                        <li><p><strong>Skype: </strong> {{ $setting_contact->skype }}</p></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
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
