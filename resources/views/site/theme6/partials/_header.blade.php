<script src="{{asset('site/theme6/js2/scripts.js')}}"></script>

<header id="Header">
    <div class="header_placeholder"></div>
        <div id="Top_bar" class="loading">
            <div class="container">
                <div class="column one">
                    <div class="top_bar_left clearfix">
                        <div class="logo">
                            <a id="logo" href="/" title="BeManTech"><img class="logo-main scale-with-grid" src="{{asset('site/theme6/content2/technics/images/bemantech.png')}}" alt="technics" /><img class="logo-sticky scale-with-grid" src="{{asset('site/theme6/content2/technics/images/bemantech.png')}}" alt="technics" /><img class="logo-mobile scale-with-grid" src="{{asset('site/theme6/content2/technics/images/bemantech.png')}}" alt="technics" />
                            </a>
                        </div>
                                <div class="menu_wrapper">
                                    <nav id="menu" class="menu-main-menu-container">
                                        <ul id="menu-main-menu" class="menu">
                                            <!-- <li class="current_page_item"> -->
                                            <!-- <li >
                                                <a href="/"><span>Home</span></a>
                                            </li> -->
                                            @foreach($site_nav as $nav)
                                                    @if(empty($nav->dropdown))
                                                        <li>
                                                            @if(App::getLocale() == 'en')
                                                                <a style="font-size: 14px !important;" href="{{ $nav->url }}"><span>{{ $nav->title->en }}</span></a>
                                                            @else
                                                                <a style="font-size: 14px !important;" href="{{ $nav->url }}"><span>{{ $nav->title->bn }}</span></a>
                                                            @endif
                                                        </li>
                                                    @else
                                                        <li class="has-children">
                                                            @if(App::getLocale() == 'en')
                                                                <a style="font-size: 14px !important;" href="javascript:void(0)">{{ $nav->title->en }}</a>
                                                            @else
                                                                <a style="font-size: 14px !important;" href="javascript:void(0)">{{ $nav->title->bn }}</a>
                                                            @endif
                                                            <ul class="dropdown">
                                                                @foreach($nav->dropdown as $subnav)
                                                                    <li>
                                                                        <a style="font-size: 14px !important;" href="{{ $subnav->url }}">{{ $subnav->title }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            
                                        </ul>
                                    </nav>
                                    <a class="responsive-menu-toggle" href="#"><i class="icon-menu"></i></a>
                                    <!-- <a class="responsive-custom-toggle" href="#"><i class="icon-menu"></i></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
</header>