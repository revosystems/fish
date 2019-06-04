<!-- Main Sidebar -->
<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
    <div class="main-navbar">
        <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
            <a class="navbar-brand w-100 mr-0" href="/" style="line-height: 25px;">
                <div class="d-table m-auto">
                    <img src="{{ asset('/images/logo-overview-colored.png') }}" class="mr-1" alt="REVO OVERVIEW" />
                </div>
            </a>
            <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
            </a>
        </nav>
    </div>
    <div class="nav-wrapper">
        <ul class="nav flex-column">
            @include('components.sidebarItem', [
                 "url"      => route('lead.create'),
                 "title"    => __('admin.newLead'),
                 "icon"     => 'library_add',
            ])

            @include('components.sidebarItem', [
                 "url"      => route('thrust.index', ['leads']),
                 "title"    => trans_choice('admin.lead', 2),
                 "icon"     => 'assignment',
                 "count"    => App\Repositories\LeadsRepository::all()->count()
            ])

            @if (auth()->user()->admin)
                @include('components.sidebarItem', [
                     "url"      => route('thrust.index', ['organizations']),
                     "title"    => trans_choice('admin.organization', 2),
                     "icon"     => 'recent_actors',
                     "count"    => App\Repositories\OrganizationsRepository::all()->count()
                ])
            @endif
            @include('components.sidebarItem', [
                 "url"      => route('reports'),
                 "title"    => trans_choice('admin.report', 2),
                 "icon"     => 'insert_chart'
            ])

        </ul>
    </div>
</aside>