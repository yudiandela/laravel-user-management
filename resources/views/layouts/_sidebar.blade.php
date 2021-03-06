<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{ asset(Auth::user()->user_image) }}" alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                    <span class="text-secondary text-small">{{ Auth::user()->roleString() }}</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item {{ Active::checkRoute('admin.index') }}">
            <a class="nav-link" href="{{ route('admin.index') }}">
                <span class="menu-title">{{ __('Dashboard') }}</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item {{ Active::checkRoute('admin.user.*') }} ">
            <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users">
                <span class="menu-title">{{ __('Users') }}</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account-multiple menu-icon"></i>
            </a>
            <div class="collapse {{ Active::checkRoute('admin.user.*','show') }}" id="users">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.user.index') }}">{{ __('All Users') }}</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.user.create') }}">{{ __('Add Users') }}</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>