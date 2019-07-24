@extends('layouts.admin')

@section('content')
    @include('admin.reports.common.reportsDescription', [
    "title"     => $title,
    "filters"   => [
        'filters'       => $filters,
        'filterForms'   => array_merge(['dates', 'product', 'status', 'user']),
        'totalize'      => [
            'day'           => trans_choice('reports.day',          1),
            'dayAndUser'    => trans_choice('reports.dayAndUser',   1),
            'dayOfWeek'     => trans_choice('reports.dayOfWeek',    1),
            'week'          => trans_choice('reports.week',         1),
            'month'         => trans_choice('reports.month',        1),
            'monthAndUser'  => trans_choice('reports.monthAndUser', 1),
            'user'          => trans_choice('reports.user',         1),
            'status'        => trans_choice('reports.status',       1),
        ],
    ],
    'export'    => 'leads',
])


    <div class="mb4 mt4">
        @paginator($data)
        {!! (new App\Reports\Exporters\LeadExporter)->toHtml($data) !!}
        @paginator($data)
    </div>
    <div class="card card-small mb-4">
    </div>
@stop

@section('scripts')
@stop