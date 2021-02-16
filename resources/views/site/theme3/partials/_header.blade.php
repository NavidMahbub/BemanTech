<header id="header">

    <div id="topHeader">
        <div class="wrapper">
            <div class="top_contact_info">
                <div class="container">
                    <ul class="tci_list_left">
                        <li>Recruiting License No: {{ $setting_site->license_no }}</li>
                        <li>|</li>
                        <li>Company Reg. No: {{ $setting_site->registration_no }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="trueHeader">
        <div class="wrapper">
            <div class="container">

                <div class="logo-bar">
                    <div class="one_third">
                        <a href="{{ url('/') }}" class="logo">
                            <img src="http://www.westlineoverseas.com.bd/storage/source/111.jpg" width="370" height="100" alt="">
                        </a>
                    </div>
                    <div class="two_third last">
                        <div class="one_half">
                            <div class="cont-head">
                                <i class="icon-mobile-phone"></i> {{ $setting_contact->primary_phone }}<br>
                                <i class="icon-phone-sign"></i> {{ $setting_contact->primary_tel }}<br>
                                <a href="skype:{{ $setting_contact->skype }}" class="skype" title="Skype" target="_blank"><i class="icon-skype"></i> {{ $setting_contact->skype }}</a> <span>(Skype)</span><br>
                                <a href="mailto:{{ $setting_contact->primary_email }}"><i class="icon-envelope"></i> {{ $setting_contact->primary_email }}</a>
                            </div>
                        </div>
                        <div class="one_third">
                            <ul class="ss_social clear">
                                <li><a href="{{ $setting_contact->facebook }}" class="facebook" title="Facebook" target="_blank"></a></li>
                                <li><a href="{{ $setting_contact->twitter }}" class="twit" title="Twitter" target="_blank"></a></li>
                                <li><a href="{{ $setting_contact->linkedin }}" class="in" title="LinkedIn" target="_blank"></a></li>
                                <li><a href="{{ $setting_contact->google_plus }}" class="gplus" title="Google Plus" target="_blank"></a></li>
                                <li><a href="skype:{{ $setting_contact->skype }}" class="skype" title="Skype" target="_blank"></a></li>
                                <li><a href="{{ $setting_contact->youtube }}" class="utube" title="YouTube" target="_blank"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="menuBar">
                    <nav id="access" class="access" role="navigation">
                        <div id="menu" class="menu">
                            <ul id="tiny">
                                @foreach($site_nav as $nav)
                                    @if(empty($nav->dropdown))
                                        <li>
                                            <a href="{{ $nav->url }}">{{ $nav->title }}</a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="javascript:void(0)">{{ $nav->title }} <i class="icon-angle-down"></i></a>
                                            <ul>
                                                @foreach($nav->dropdown as $subnav)
                                                    <li>
                                                        <a style="width: 100%;" href="{{ $subnav->url }}" title="">{{ $subnav->title }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </nav>
                </div>

            </div>
        </div>
    </div>

</header>

<div class="clearfix"></div>
