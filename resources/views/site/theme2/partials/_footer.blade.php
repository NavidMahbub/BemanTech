<div class="footer_border1"></div>
<div class="footer_border2">
    <div class="wrapper">
        <div class="main_wrapper">
            <div class="online_bt2">
                <a href="{{ url('/') }}" style="height: 68px;">
                    <img src="{{ $setting_site->logo ? $setting_site->logo : asset('site/theme2/images/logo.png') }}"/>
                </a>
            </div>
            <div class="footer_link_div">
                <div class="link1">
                    {{--@include('site.theme2.widgets.footer.widget1')--}}
                </div>
                <div class="link1">
                    {{--@include('site.theme2.widgets.footer.widget2')--}}
                </div>
            </div>
            <div class="address_div">
                <div class="adderss_font">Contact</div>
                <p>
                    {{ $setting_contact->address }}<br/>
                    {{ $setting_contact->primary_email }}<br/>
                    {{ $setting_contact->primary_phone }}
                </p>
            </div>
        </div>
    </div>
</div>
