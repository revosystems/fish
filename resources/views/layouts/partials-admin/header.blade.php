<nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
    <ul class="navbar-nav flex-row ">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                @include('components.gravatar',["user" => auth()->user() ])
                <span class="d-none d-md-inline-block">{{auth()->user()->name." ".auth()->user()->surname1}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-small">
                <a class="dropdown-item" href="{{route('lead.create')}}">
                    @iconMaterial(library_add) {{__('admin.newLead')}}
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="{{route('logout')}}">
                    <span class="text-danger">@iconMaterial(&#xE879;)</span> {{ __('admin.logout') }}
                </a>
            </div>
        </li>
    </ul>
    <nav class="nav">
        <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
            @iconMaterial(&#xE5D2;)
        </a>
    </nav>
</nav>