@extends('layouts.admin')

@section('content')
    @include('admin.reports.common.reportsDescription', [
        "title"     => $title,
        "filters"   => [
            'filters'       => $filters,
            'filterForms'   => array_merge(['dates', 'product', 'type_segment', 'general_typology', 'property_spaces', 'property_franchise', 'status', 'user_id']),
            'groupByDate'   => true,
            'groupBy'      => [
                'product'           => trans_choice('reports.product', 1),
                'type_segment'       => trans_choice('reports.type_segment', 1),
                'general_typology'   => trans_choice('reports.general_typology', 1),
                'property_spaces'    => trans_choice('reports.property_spaces', 1),
                'property_franchise'    => trans_choice('reports.property_franchise', 1),
                'status'            => trans_choice('reports.status',   1),
                'user_id'           => trans_choice('reports.user',     1),
                'devices'           => trans_choice('reports.device',     1),
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
    <script>
        $('select[multiple]').select2({
            placeholder: "--",
            width:"resolve"
        });
        $('#group-by-date').on('change', function () {
            $('#filter_date_button').click();
        });
    </script>
@stop