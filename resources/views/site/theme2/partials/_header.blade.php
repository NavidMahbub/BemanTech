<div style="width: 100%; height: 130px;">
    <div class="logo">
        <a href="{{ url('/') }}">
            <img style="height: 68px;" src="{{ $setting_site->logo ? $setting_site->logo : asset('site/theme2/images/logo.png') }}"/>
        </a>
    </div>
    <div class="logo" style="float: right !important;">
        <a href="{{ url('/') }}">
            <img style="height: 68px;" src="{{ asset('site/theme2/images/online_bt.jpg') }}"/>
        </a>
    </div>
</div>
<div class="clear"></div>
<div class="menu_div">
    <div class="nav">
        <ul class="nav-list">
            @foreach($site_nav as $nav)
                @if(empty($nav->dropdown))
                    <li class="nav-item" style="background:none;">
                        <a class="act" href="{{ $nav->url }}">{{ $nav->title }}</a>
                    </li>
                @else
                    <li class="nav-item" style="background:none;">
                        <a class="act" href="{{ $nav->url ? $nav->url : 'javascript:void(0)' }}">{{ $nav->title }}</a>
                        <ul class="nav-submenu">
                            @foreach($nav->dropdown as $subnav)
                                <li class="nav-submenu-item">
                                    <a href="{{ $subnav->url }}">{{ $subnav->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>
<div class="clear"></div>
