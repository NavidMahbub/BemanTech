<header>
    <div class="header-top-area black-bg hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <ul class="top-right">
                        <li>
                            <i class="fa fa-envelope"></i>
                            <span>{{ $setting_contact->primary_email }}</span>
                        </li>
                        <li>
                            <i class="fa fa-phone"></i>
                            <span>{{ $setting_contact->primary_phone }}</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-6 hidden-xs">
                    <div class="header-icon floatright">
                        <a href="{{ $setting_contact->facebook }}"><i class="fa fa-facebook"></i></a>
                        <a href="{{ $setting_contact->twitter }}"><i class="fa fa-twitter"></i></a>
                        <a href="{{ $setting_contact->google_plus }}"><i class="fa fa-google-plus"></i></a>
                        <a href="{{ $setting_contact->linkedin }}"><i class="fa fa-linkedin"></i></a>
                        <a href="{{ $setting_contact->youtube }}"><i class="fa fa-youtube"></i></a>
                        <a href="{{ $setting_contact->skype }}"><i class="fa fa-skype"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-2">
                    <div class="logo" style="margin-top: 0 !important;">
                        <a href="{{ url('/') }}"><img style="height: 50px; margin-top: 15px;" src="{{ $setting_site->logo }}" alt="{{ $setting_site->logo }}" /></a>
                    </div>
                </div>
                <div class="col-md-10 col-sm-10">
                    <div class="main-menu floatright">
                        <nav>
                            <ul>
                                @foreach($site_nav as $nav)
                                    @if(empty($nav->dropdown))
                                        <li>
                                            <a href="{{ $nav->url }}">{{ $nav->title }}</a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="javascript:void(0)">{{ $nav->title }}<i class="fa fa-angle-down"></i></a>
                                            <ul class="submenu">
                                                @foreach($nav->dropdown as $subnav)
                                                    <li>
                                                        <a href="{{ $subnav->url }}">{{ $subnav->title }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
        </div>
    </div>
</header>
