<nav class="t-header">
    <div class="t-header-brand-wrapper">
        <a href="{{route('admin.home')}}">
            <h2 style="color: black">Crypto Admin </h2>
            {{--<img class="logo" src="{{ asset('admin-assets/images/logo.svg') }}" alt="">--}}
            {{--<img class="logo-mini" src="{{ asset('admin-assets/images/logo_mini.svg') }}" alt="">--}}
        </a>
    </div>
    <div class="t-header-content-wrapper">
        <div class="t-header-content">
            <button class="t-header-toggler t-header-mobile-toggler d-block d-lg-none">
                <i class="mdi mdi-menu"></i>
            </button>
            <form action="#" class="t-header-search-box">
                <div class="input-group">
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search" autocomplete="off">
                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-arrow-right-thick"></i></button>
                </div>
            </form>
            <ul class="nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="appsDropdown" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-bell mdi-1x"></i>
                    </a>
                    <div class="dropdown-menu navbar-dropdown dropdown-menu-right" aria-labelledby="appsDropdown">
                        <div class="dropdown-header">
                            <h6 class="dropdown-title">Notifications ({{auth()->user()->unreadNotifications->count()}})</h6>
                        </div>
                        <div class="dropdown-body border-top pt-0">
                            @foreach (auth()->user()->unreadNotifications as $notification)
                                <a href="#" class="dropdown-list">
                                    <i class="grid-icon mdi mdi-bell-circle mdi-2x pr-2"></i>
                                    <small class="grid-tittle">{{$notification->data['data']}}</small>
                                </a>
                            @endforeach
                                <a style="width: 100%" href="{{route('admin.notification.index')}}" class="btn btn-secondary">View All</a>
                        </div
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="appsDropdown" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-apps mdi-1x"></i>
                    </a>
                    <div class="dropdown-menu navbar-dropdown dropdown-menu-right" aria-labelledby="appsDropdown">
                        <div class="dropdown-header">
                            <h6 class="dropdown-title">Settings</h6>

                        </div>
                        <div class="dropdown-body border-top pt-0">
                            <a class="dropdown-grid">
                                <i class="grid-icon mdi mdi-jira mdi-2x"></i>
                                <span class="grid-tittle">Profile</span>
                            </a>
                            <a class="dropdown-grid" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="grid-icon mdi mdi-trello mdi-2x"></i>
                                <span class="grid-tittle">Logout</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>

                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>