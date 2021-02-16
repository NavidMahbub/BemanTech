{{--<div class="clients" style="margin-bottom: 20px;">
    <div class="container">
        <h3 class="t-clients">Our valued clients</h3>
        <ul id="mycarouselthree" class="jcarousel-skin-tango carousel">
            @foreach($clients as $ckey => $client)
                <li class="{{ $ckey == 0 ? 'active' : '' }}">
                    <img src="{{ $client->logo }}" width="210" height="40" alt="{{ $client->name }}">
                </li>
            @endforeach
        </ul>
    </div>
</div>--}}

<div class="clearfix mar_top1"></div>

<div class="footer">
    <div class="arrow_02"></div>

    <div class="clearfix mar_top1"></div>

    <div class="container">

        <div class="one_fourth">
            <h2>Contact <i>Address</i></h2>
            <ul class="contact_address">
                <li>
                    Post Box No: {{ $setting_contact->po }}, <br>
                    {{ $setting_contact->address }}
                </li>
                <li>
                    Phone: {{ $setting_contact->primary_phone }}
                </li>
                <li>
                    Tel: {{ $setting_contact->primary_tel }}
                </li>
                <li>
                    Fax: {{ $setting_contact->primary_fax }}
                </li>
                <li>
                    Email: <a href="mailto:{{ $setting_contact->primary_email }}">{{ $setting_contact->primary_email }}</a>,
                    <a href="mailto:{{ $setting_contact->secondary_email }}">{{ $setting_contact->secondary_email }}</a></li>
                <li>
                    Working Hours: {{ $setting_contact->working_hours }}<br>
                    Working Days: {{ $setting_contact->working_days }}
                </li>
            </ul>
        </div>

        <div class="one_fourth">
            <h2>Useful <i>Links</i></h2>
            <ul class="list">
                <li><a href=""><i class="icon-angle-right"></i> Home</a></li>
                <li><a href=""><i class="icon-angle-right"></i> About Us</a></li>
            </ul>
        </div>

        <div class="one_fourth">
            <div class="twitter_feed">
                <h2>Latest <i>Tweets</i></h2>
            </div>
        </div>

        <div class="one_fourth last">
            <h2>Facebook <i>Likebox</i></h2>
            <div>
                {{--<iframe src="http://www.facebook.com" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:260px; height:180px; background:#FFF;" allowTransparency="true"></iframe>--}}
            </div>
        </div>
    </div>

    <div class="clearfix mar_top1"></div>
</div>

<div class="copyright_info">
    <div class="container">

        <div class="one_half">
            <b>{{ $setting_site->copyright_text }}</b>
        </div>

        <div class="one_third last" style="float: right;">
            <ul class="footer_social_links">
                <li><a href="{{ $setting_contact->facebook }}" target="_blank"><i class="icon-facebook"></i></a></li>
                <li><a href="{{ $setting_contact->twitter }}" target="_blank"><i class="icon-twitter"></i></a></li>
                <li><a href="{{ $setting_contact->google_plus }}" target="_blank"><i class="icon-google-plus"></i></a></li>
                <li><a href="{{ $setting_contact->linkedin }}" target="_blank"><i class="icon-linkedin"></i></a></li>
                <li><a href="{{ $setting_contact->skype }}" target="_blank"><i class="icon-skype"></i></a></li>
                <li><a href="{{ $setting_contact->youtube }}" target="_blank"><i class="icon-youtube"></i></a></li>
            </ul>
        </div>
    </div>
</div>

<a href="#" class="scrollup">Scroll</a>
