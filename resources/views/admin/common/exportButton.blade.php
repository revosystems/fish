<ul class="inline">
    <li class="addList"> <span class="button secondary">@icon(download) {{ trans_choice('reports.export', 1) }} </span>
        <table class="subAddList">
            <tr><td><a href="{{ BadChoice\Reports\Utils\QueryUrl::addQueryToUrl(url("admin/reports/export/csv/{$export}"), request()->getQueryString()) }}"> {{ __('reports.exportCSV') }}</a></td></tr>
            <tr><td><a href="{{ BadChoice\Reports\Utils\QueryUrl::addQueryToUrl(url("admin/reports/export/xls/{$export}"), request()->getQueryString()) }}"> {{ __('reports.exportXLS') }}</a></td></tr>
        </table>
    </li>
</ul>
@section('scripts')
    @parent
    <script>
        $('.addList').click(function() {
            $(this).find('.subAddList').toggle();
        });
    </script>
@endsection
