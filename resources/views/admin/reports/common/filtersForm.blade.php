@php
    use App\Models\Lead;
@endphp

<div class="filters">
    @if(isset($url)) {{ Form::open(["url" => $url, 'method'=>'get']) }}
    @else            {{ Form::open(["url" => request()->getUri(), 'method'=>'get']) }}    @endif

    @foreach($filterForms as $filter)
        @if($filter == 'dates')
            @include('admin.reports.common.dateFilters')
        @endif
    @endforeach

    <a class="button secondary" onclick="$('#filters').slideToggle('fast'); $('#filters-applied').slideToggle('fast');"> @icon(filter) {{ __("reports.showFilters") }}</a>
    <div id="filters" class="hidden mt4">
        @foreach($filterForms as $filter)
            @if($filter == 'product')
                @icon(barcode)
                {{ Form::select('product', ["" => "--"] + App\Models\Product::all()->map(function($p1) {return $p1["name"];})->toArray(), $filters->valueFor('product')) }}
            @elseif($filter == 'status')
                @icon(bookmark)
                {{ Form::select('status', ["" => "--"] + App\Models\Status::all()->map(function($p1) {return $p1["name"];})->toArray(), $filters->valueFor('status')) }}
            @elseif($filter == 'user')
                @icon(user)
                {{ Form::select('user', createSelectArray(App\Models\User::all(), true), $filters->valueFor('user')) }}
            @endif
        @endforeach

        @if( isset($totalize) )
            @icon(pie-chart)
            {{ Form::select('totalize', array_merge(["" => "--"], $totalize), $filters->valueFor('totalize')) }}
        @endif
        @if( $filterForms )
            <button>@icon(filter) {{ __('reports.filter') }}</button>
        @endif
    </div>
    {{ Form::close()}}

    @include('admin.reports.common.filtersApplied')
</div>
