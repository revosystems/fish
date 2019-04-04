<div class="sidebar" id="sidebar">
    <div class="show-mobile absolute ml2 mt-2 fs3">
        <span class="fs3 white" onclick="toggleSidebar()">X</span>
    </div>
    <img style="width: 105px; height: 105px;" src="{{ url("/images/orange_inverted.jpg") }}">
    @include('layouts.sidebar.leads')
    @include('layouts.sidebar.organizations')

    <br>
    <h4> @icon(bar-chart) {{ trans_choice('admin.report', 2) }}</h4>
    <ul>
        @include('components.sidebarItem', ["url" => route('reports'), "title" => trans_choice('admin.report', 2) ])
    </ul>
    <br><br>
</div>

<div class="show-mobile absolute ml2 mt3 fs3">
    <span class="fs3 black" onclick="toggleSidebar()">☰</span>
</div>