<nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
    <ul class="navbar-nav flex-row ">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                @include('components.gravatar',["user" => auth()->user() ])
                <span class="d-none d-md-inline-block">{{auth()->user()->name." ".auth()->user()->surname1}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-small">
                <a class="dropdown-item" href="user-profile-lite.html">
                    <i class="material-icons">&#xE7FD;</i> {{ __('admin.myProfile') }}</a>
                <a class="dropdown-item" href="add-new-post.html">
                    <i class="material-icons">library_add</i> {{__('admin.newLead')}}</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="{{route('logout')}}">
                    <i class="material-icons text-danger">&#xE879;</i> {{ __('admin.logout') }} </a>
            </div>
        </li>
    </ul>
    <nav class="nav">
        <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
            <i class="material-icons">&#xE5D2;</i>
        </a>
    </nav>
</nav>