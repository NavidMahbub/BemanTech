<header class="app-header">
    <a class="app-header__logo" href="{{ url('admin/dashboard') }}">Admin Panel</a>
    <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
    <ul class="app-nav" style="flex: 0 0 auto !important;">
        <!-- Dashboard -->
        <li class="dropdown">
            <a aria-label="Dashboard" class="app-nav__item" href="#">
                <i class="fa fa-dashboard fa-lg"></i>
            </a>
        </li>
    </ul>
    <ul class="app-nav">
        <!-- User Menu -->
        <li class="dropdown">
            <a aria-label="Show notifications" class="app-nav__item" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-lg"></i>
            </a>
            <ul class="app-notification dropdown-menu dropdown-menu-right" style="min-width: 200px !important;">
                <div class="app-notification__content">
                    @if(auth()->user()->type == 2 || auth()->user()->type == 0)
                    <li>
                        <a class="app-notification__item" href="{{ url('/admin/setting/profile') }}">
                            <span class="app-notification__icon">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                                </span>
                            </span>
                            <div>
                                <p style="margin-top: 10px;" class="app-notification__message">Profile Settings</p>
                            </div>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->type == 1)
                    <li>
                        <a class="app-notification__item" href="{{ url('/admin/registered-profile') }}">
                            <span class="app-notification__icon">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                                </span>
                            </span>
                            <div>
                                <p style="margin-top: 10px;" class="app-notification__message">Registration Data</p>
                            </div>
                        </a>
                    </li>
                    @endif
                    <li>
                        <a class="app-notification__item" href="{{ url('/admin/setting/password') }}">
                            <span class="app-notification__icon">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fa fa-gear fa-stack-1x fa-inverse"></i>
                                </span>
                            </span>
                            <div>
                                <p style="margin-top: 10px;" class="app-notification__message">Password Setting</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="app-notification__item" href="javascript:void(0)" onclick="
                            event.preventDefault();
                            document.getElementById('logout-form').submit();
                        ">
                            <span class="app-notification__icon">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fa fa-sign-out fa-stack-1x fa-inverse"></i>
                                </span>
                            </span>
                            <div>
                                <p style="margin-top: 10px;" class="app-notification__message">Logout</p>
                            </div>
                        </a>
                        <!-- Logout request form -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </div>
            </ul>
        </li>
    </ul>
</header>