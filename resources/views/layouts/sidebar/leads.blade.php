<br>
<h4> @icon(dot-circle-o) {{ trans_choice('admin.lead', 2) }}</h4>
<ul>
    @php ( $repository = new App\Repositories\LeadsRepository )
    @include('components.sidebarItem', ["url" => route('thrust.index', ['leads']),         "title" => trans_choice('admin.lead',        2), "count" => $repository->all()           ->count()] )
</ul>